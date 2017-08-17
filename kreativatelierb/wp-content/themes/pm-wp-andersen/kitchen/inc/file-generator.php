<?php

class pmFileGenerator
{
    public function __construct($filename, $filetype, $output)
    {
        $this->filename = $filename;
        $this->uploadsdirectorypath = PMBASEDIR;
        $this->fullfilepath = $this->uploadsdirectorypath . "/" . $filename;
        $this->fullfileurl = PMUPLOADSURL . $this->filename;
        $this->filetype = $filetype;
        $this->output = $output;

        $this->pmCheckWritable();
        if (pm_get_option("marker_for_recompile_custom_files") !== "no") {
            $this->pmSaveData();
        }
    }

    public function pmIsWritable()
    {
        if (!is_writable($this->uploadsdirectorypath)) {
            function pm_admin_notice_1()
            {
                ?>
                <div class="error">
                    <p><?php _e("Please set CHMOD 777 for 'wp-content/uploads/ folder and all files under it.", "pm_local"); ?></p>
                </div>
            <?php
            }

            add_action('admin_notices', 'pm_admin_notice_1');
            return false;
        }
        return true;
    }

    public function pmSaveData()
    {
        if ($this->pmCheckWritable()) {
            $handle = fopen($this->fullfilepath, 'w');
            fwrite($handle, str_replace(array("  ", "\n"), "", $this->output));
            if (is_array(get_option(PMTHEMEPREFIX . "pm_options")) && count((get_option(PMTHEMEPREFIX . "pm_options"))) > 1) {
                pm_update_option("marker_for_recompile_custom_files", "no");
            }
        }
        return false;
    }

    public function pmCheckWritable()
    {
        if (is_readable($this->fullfilepath)) {
            if (is_writable($this->fullfilepath)) {
                return true;
            } else {
                function pm_admin_notice_2()
                {
                    ?>
                    <div class="error">
                        <p><?php _e("Please set CHMOD 777 for 'wp-content/uploads/ folder and all files under it.", "pm_local"); ?></p>
                    </div>
                <?php
                }

                add_action('admin_notices', 'pm_admin_notice_2');
                return false;
            }
        } else {
            if ($this->pmIsWritable()) {
                $fp = fopen($this->fullfilepath, 'w');
                chmod($this->fullfilepath, 0777);
                $this->pmSaveData();
                return true;
            } else {
                return false;
            }
        }
    }
}