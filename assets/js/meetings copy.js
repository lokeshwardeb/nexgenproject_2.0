function start_meeting(username, meeting_code){
    // call = window.Daily.createFrame({
    //     showLeaveButton: true,
    //     iframeStyle: {
    //       position: 'fixed',
    //       top: '0',
    //       left: '0',
    //       width: '100%',
    //       height: '100%',
    //     },
    //   });

    // call = window.Daily.createFrame({
    //     showLeaveButton: true,
    //     showFullscreenButton: true,
    //     iframeStyle: {
    //     //   position: 'absolute',
    //       position: 'relative',
    //     //   top: '5%',
    //       top: '10vh',
    //       left: '40%',
    //       width: '50%',
    //       height: '70%',
    //     //   width: '100%',
    //     //   height: '100%',
    //     },
    //   });

    call = window.Daily.createFrame({

      theme: {
        colors: {
          // accent: '#1AA1FB',
          accent: '#243CFC',
          accentText: '#FFFFFF',

        },

      },

        // redirect_on_meeting_exit : '/dashboard',
        showLeaveButton: true,
        showFullscreenButton: true,
        iframeStyle: {
        //   position: 'absolute',
          position: 'relative',
        //   top: '5%',
          top: '0',
        //   left: '40%',
          width: '100%',
          height: '100vh',
        //   width: '100%',
        //   height: '100%',
        },
      });

      var participants = call.participantCounts().present;

      console.log(participants)

      const get_last_participant = participants;

      call.on('left-meeting', () =>{

      console.log(get_last_participant)


        // if(participants == 1 || participants < 1){
        if(participants == 1 || participants == '1'){
          // that means the participant is less than 1 and the meeting should be closed
          console.log("before delete participants" + participants);
          $.ajax({
            type: "POST",
            url: "/delete_meeting",
            data: {meeting_code : meeting_code},
            // dataType: "dataType",
            success: function (response) {
              alert(response)
            }
          });
        }




        setTimeout(() => {
          
          window.location.href = '/dashboard';
          
        }, 5000);
        // window.location.href = '/dashboard';
      })

      // var participants = call.participantCounts();

      // console.log(participants)

      call.on('meeting-ended', () =>{
        window.location.href = '/meeting_ended';
      })






      // call.setTheme({
      //   colors: {
      //     accent: '#286DA8',
      //     accentText: '#ddd',
      //     // accentText: '#FFFFFF',
      //     // background: '#FFFFFF',
      //     background: '#ddd',
      //     backgroundAccent: '#ddd',
      //     // backgroundAccent: '#FBFCFD',
      //     // baseText: '#000000',
      //     baseText: '#ddd',
      //     border: '#EBEFF4',
      //     mainAreaBg: '#000000',
      //     mainAreaBgAccent: '#333333',
      //     mainAreaText: '#ddd',
      //     // mainAreaText: '#FFFFFF',
      //     supportiveText: '#ddd',
      //     // supportiveText: '#808080',
      //   },
      // });





      // call.setTheme({
      //   colors: {
      //     accent: '#286DA8',
      //     accentText: '#FFFFFF',
      //     background: '#FFFFFF',
      //     backgroundAccent: '#FBFCFD',
      //     baseText: '#000000',
      //     border: '#EBEFF4',
      //     mainAreaBg: '#000000',
      //     mainAreaBgAccent: '#333333',
      //     mainAreaText: '#FFFFFF',
      //     supportiveText: '#808080',
      //   },
      // });
      




  
    var join_meeting = call.join({
        url: 'https://nexgenproject.daily.co/nexgenproject_meetings',
        userName: username,
    });

    // $("#meeting_container").append(join_meeting);

     // Append the created iframe to the meeting container
     $("#meeting_container").append(call.iframe());


     call.destroy();

    //  console.log(participants)

    //  call.destroy();

    //  console.log("call destroyed");


}

// start_meeting();