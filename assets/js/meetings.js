function start_meeting(username){
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
  
    var join_meeting = call.join({
        url: 'https://nexgenproject.daily.co/nexgenproject_meetings',
        userName: username,
    });

    // $("#meeting_container").append(join_meeting);

     // Append the created iframe to the meeting container
     $("#meeting_container").append(call.iframe());

}

// start_meeting();