<!--

function attachmentChanged()
{
    var usedFields = 0;
    var fields = new Array();

    for (var i = 0; i < document.nletter_form.elements.length; i++) {

        if (document.nletter_form.elements[i].type == 'file' &&
            document.nletter_form.elements[i].name.substr(0, 6) == 'upload') {
            fields[fields.length] = document.nletter_form.elements[i];
        }
    }


    for (var i = 0; i < fields.length; i++) {

        if (fields[i].value.length > 0) {
            usedFields++;
        }

    }

    if (usedFields == fields.length) {
        var lastRow = document.getElementById('attachment_row_' + usedFields);
        if (lastRow) {
            var newRow = document.createElement('TR');
            newRow.id = 'attachment_row_' + (usedFields + 1);
            var td = document.createElement('TD');
            newRow.appendChild(td);
            td.align = 'left';
            //td.appendChild(document.createTextNode('Datei ' + (usedFields + 1) + ':'));
            //td.appendChild(document.createTextNode(' '));
            var file = document.createElement('INPUT');
            file.type = 'file';
            td.appendChild(file);
            file.name = 'upload[' + (usedFields + 1) + ']';
            file.onchange = function() { attachmentChanged(); };
            file.size = 25;
            file.className = 'fixed';

            lastRow.parentNode.insertBefore(newRow, lastRow.nextSibling);
        }
    }
}

// -->