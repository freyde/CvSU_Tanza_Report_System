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