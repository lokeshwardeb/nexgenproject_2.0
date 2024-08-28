function start_meeting(username, meeting_code) {
  // Create Daily call frame
  const call = window.Daily.createFrame({
      theme: {
          colors: {
              accent: '#243CFC',
              accentText: '#FFFFFF',
          },
      },
      showLeaveButton: true,
      showFullscreenButton: true,
      iframeStyle: {
          position: 'relative',
          top: '0',
          width: '100%',
          height: '100vh',
      },
  });

  // Join the meeting
  call.join({
      url: 'https://nexgenproject.daily.co/nexgenproject_meetings',
      userName: username,
  });

  // Append the created iframe to the meeting container
  $("#meeting_container").append(call.iframe());

  // Handle participant counts
  call.on('participant-joined', async () => {
      const participants = await call.participantCounts();
      console.log("Participants present:", participants.present);
  });

  call.on('participant-left', async () => {
      const participants = await call.participantCounts();
      console.log("Participants present after someone left:", participants.present);

      // If only one participant remains, delete the meeting
      if (participants.present <= 1) {
          console.log("Deleting the meeting as participant count is 1 or less.");
          $.ajax({
              type: "POST",
              url: "/delete_meeting",
              data: { meeting_code: meeting_code },
              success: function (response) {
                  // alert(response);
                  danger_alert("Meeting will be end in 5 sec ....", "Your meeting will be end in 5 sec as there has no participants exists !!")
              }
          });

          setTimeout(() => {
              window.location.href = '/dashboard';
          }, 5000);
      }else if(participants.present){
        // that means there are participants exists more that 1
        setTimeout(() => {
          window.location.href = '/dashboard';
        }, 5000);
      }
  });

  // Redirect when the meeting ends
  call.on('meeting-ended', () => {
      window.location.href = '/meeting_ended';
  });
}
