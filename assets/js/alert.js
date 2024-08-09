function success_alert(msg_title, msg){
    Swal.fire({
        title: msg_title,
        text: msg,
        icon: "success",
        // icon: "error",
        showCancelButton: false,
        confirmButtonColor: "green",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ok",

    })
}

function danger_alert(msg_title, msg){
    Swal.fire({
        title: msg_title,
        text: msg,
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "red",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ok",
    })
}

// function success_alert(msg_title, msg){
//     Swal.fire({
//         title: msg_title,
//         text: msg,
//         icon: 'success',
//         showCancelButton: false,
//         confirmButtonColor: 'green',
//         // confimButtonColor: 'green',
//         cancelButtonColor: 'black',
//         confirmButtonText: 'Ok'

//     })
// }

// function danger_alert(msg_title, msg){
//     Swal.fire({
//         title: msg_title,
//         text: msg,
//         icon: "error",
//         showCancelButton: false,
//         confirmButtonColor: 'red',
//         cancelButtonColor: 'black',
//         confirmButtonText: 'Ok'
//     })
// }
