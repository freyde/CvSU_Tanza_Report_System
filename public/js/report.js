$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})



function updateFaculty(uid) {
    var dept = document.getElementById('dept'.concat(uid));
    var desig = document.getElementById('desig'.concat(uid));

    $.ajax ({
        url: "/faculties/update",
        type: "POST",
        data: {
            uid : uid,
            dept : dept.value,
            desig : desig.value,
        }, 
        success:function(data) {
            // alert('Update Successful.');
            location.reload();
        },error:function(data) {
            alert('Error updating faculty.');
        }
      });
    console.log(dept.value +" "+ desig.value);
}

function updateYear(year, quarter) {
    $.ajax ({
        url: "/years/update",
        type: "POST",
        data: {
            year : year,
            quarter : quarter,
        }, 
        success:function(data) {
            // alert('Update Successful.');
            location.reload();
        },error:function(data) {
            alert('Error updating year.');
        }
      });

    // console.log(year +" "+ quarter)
}






//----- View Functions
    //----------------
        //------------
            //--------
                //----
                    //
function addRow(tbl_Id, fields) {
    console.log(tbl_Id);
    var table = document.getElementById(tbl_Id);
    var row = table.insertRow(1);
    for(var a = fields.length-1; a >= 0; a--) {
        row.insertCell(0).innerHTML = "<input type='text' class='form-control' id='"+ fields[a] +"_"+ tbl_Id +"' name='"+ fields[a] +"_"+ tbl_Id +"'[]>";
    }
    
    
}
