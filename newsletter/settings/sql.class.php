<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

	class myMySQL
	{
		//Connection ID
		var $id;

		//Zähler für Queries der derzeitlichen Datenbankverbindung
		var $squeries;
		var $fqueries;
		var $debug=false;
		var $client='mysql';

		//Kein Parameter angegeben, dann nimm als Standard mysql
        function myMySQL($client='mysql')
        {
            switch($client)
            {
            case 'mysqli':
            case 'mysql':
            case 'sqlite':

                if(extension_loaded($client))
                {
                $this->client = $client;
                }
                else
                {
                die("Extension \"" . $client . "\" not loaded.");
                }

			break;

            default:
            $this->client='mysql';
            }

   			$this->id=false;
			$this->squeries=0;
			$this->fqueries=0;
		}

		//Aufbau einer Verbindung
		function connect($host,$username="",$password="",$database="")
		{
			if($this->client=='mysql')
			{
			$this->id = mysql_connect($host, $username, $password);
			}
			elseif($this->client=='mysqli')
			{
			$this->id = mysqli_connect($host, $username, $password);
			}
			elseif($this->client=='sqlite')
			{
			$this->id = sqlite_open($host);
			}

			//Wenn keine erfolgte Verbindung...
			if(!$this->id)
			{
				if($this->client=='mysql')
				{
					$errno = $this->errno();
					$error = $this->error();
				}
				elseif($this->client=='mysqli')
				{
					$errno = mysqli_connect_errno($this->id);
					$error = mysqli_connect_error($this->id);
				}
				elseif($this->client=='sqlite')
				{
					$errno = sqlite_error_string($this->id);
					$error = sqlite_error_string($this->id);
				}
				die(__FILE__ . "(" . __LINE__ . "):<br />" . $errno . ': ' . $error);
				unset($this->id);
				$this->id = false;
				return -1;
			}
			//... ansonsten wähle die Datenbank
			else
			{
				if($this->client=='mysql')
				{
					$db=mysql_select_db($database, $this->id);
				}
				elseif($this->client=='mysqli')
				{
					$db=mysqli_select_db($this->id, $database);
				}
				elseif($this->client=='sqlite')
				{
					$db=true;
				}
				//Wenn DB nicht gefunden/vorhanden
				if(!$db)
				{
					$errno=$this->errno();
					$error=$this->error();
					die(__FILE__ . " <b>&#187;</b> Line (" . __LINE__ . "):<br />" . $errno . ': ' . $error);
					unset($this->id);
					$this->id = false;
					return -2;
				}
			}

		return 1;
		}


		################################################################
		################################################################
		/* SQL Funktionen */

		function &query($sql)
		{
			if(!$this->id)
			{
				return false;
			}
			if($this->client == 'mysql')
			{
				$result=mysql_query($sql, $this->id);
			}
			elseif($this->client == 'mysqli')
			{
				$result=mysqli_query($this->id, $sql);
			}
			elseif($this->client == 'sqlite')
			{
				$result=sqlite_query($this->id, $sql);
			}
			if($result)
			{
				$this->squeries++;
				return $result;
			}
			else
			{
				//$errno = $this->errno();
				//$error = $this->error();
				//die(__FILE__ . "(" . __LINE__ . "):<br />" . $errno . ': ' . $error);
				$this->fqueries++;
				return false;
			}
		}

		function fetchArray($resultID,$type=MYSQL_ASSOC)
		{
			if(!$this->id)
			{
				return false;
			}
			if($this->client=='mysql')
			{
				return mysql_fetch_array($resultID, $type);
			}
			elseif($this->client=='mysqli')
			{
				return mysqli_fetch_array($resultID, $type);
			}
			elseif($this->client=='sqlite')
			{
				return sqlite_fetch_array($resultID, $type);
			}
		}

		function result($resultID,$type)
		{
			if(!$this->id)
			{
				return false;
			}
			if($this->client=='mysql')
			{
				return mysql_result($resultID, $type);
			}
			elseif($this->client=='mysqli')
			{
				return mysqli_result($resultID, $type);
			}
		}

		function fetchObject($resultID)
		{
			if(!$this->id)
			{
				return false;
			}
			if($this->client=='mysql')
			{
				return mysql_fetch_object($resultID);
			}
			elseif($this->client=='mysqli')
			{
				return mysqli_fetch_object($resultID);
			}
			elseif($this->client=='sqlite')
			{
				return sqlite_fetch_object($resultID);
			}
		}

		function fetchRow($resultID)
		{
			if(!$this->id)
			{
				return false;
			}
			if($this->client=='mysql')
			{
				return mysql_fetch_row($resultID);
			}
			elseif($this->client=='mysqli')
			{
				return mysqli_fetch_row($resultID);
			}
			elseif($this->client=='sqlite')
			{
				return fetch_array($resultID);
			}
		}

		function numRows($resultID)
		{
			if(!$this->id)
			{
				return false;
			}
			if($this->client=='mysql')
			{
				return @mysql_num_rows($resultID);
			}
			elseif($this->client=='mysqli')
			{
				return @mysqli_num_rows($resultID);
			}
			elseif($this->client=='sqlite')
			{
				return @sqlite_num_rows($resultID);
			}
		}

		function freeResult($resultID)
		{
			if(!$this->id)
			{
				return false;
			}
			if($this->client=='mysql')
			{
				return mysql_free_result($resultID);
			}
			elseif($this->client=='mysqli')
			{
				return mysqli_free_result($resultID);
			}
		}

		function insertId()
		{
			if(!$this->id)
			{
				return false;
			}
			if($this->client=='mysql')
			{
				return mysql_insert_id();
			}
			elseif($this->client=='mysqli')
			{
				return mysqli_insert_id();
			}
			elseif($this->client=='sqlite')
			{
				return sqlite_last_insert_rowid();
			}
		}

		function close()
		{
			if($this->client=='mysql')
			{
				mysql_close($this->id);
			}
			elseif($this->client=='mysqli')
			{
				mysqli_close($this->id);
			}
			elseif($this->client=='sqlite')
			{
				sqlite_close($this->id);
			}
		}


		################################################################
		################################################################
		/* Error Handling */

		function error()
		{
			if($this->client=='mysql')
			{
				return @mysql_error($this->id);
			}
			elseif($this->client=='mysqli')
			{
				return @mysqli_error($this->id);
			}
			elseif($this->client=='sqlite')
			{
				return @sqlite_error_string($this->id);
			}
		}

		function errno()
		{
			if($this->client=='mysql')
			{
				return @mysql_errno($this->id);
			}
			elseif($this->client=='mysqli')
			{
				return @mysqli_errno($this->id);
			}
			elseif($this->client=='mysqli')
			{
				return @sqlite_last_error($this->id);
			}
		}

		function getQueryInfo()
		{
			return "S: " . $this->squeries . " | F: " . $this->fqueries;
		}
	}

?>