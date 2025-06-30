<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();
// $controllers->create_new_meeting();
// $controllers->meetings_handler();


// if(!isset($_GET['meeting_code'])){
//     echo '
//     <script>
//     location.href="/meetings";
//     </script>
//     ';
// }

// $controllers->meetings_handler()


?>

<main>
    <div class="dashboard_main_section">
        <div class="row">
            <div class="col-md-3 " style="background-color: white !important;">
                <div class="integrate_desktop_sidebar">
                    <?php

                    require __DIR__ . '/inc/_sidebar.php';

                    ?>
                </div>

                <div class="integrate_mobile_sidebar">
                    <?php

                    include __DIR__ . '/inc/_mobile_sidebar.php';

                    ?>
                </div>

            </div>
            <div class="col-md-9 cus_bg_main_section_color">
                <div class="main_content_section scrollbar_container">

                    <div class="the_running_main_content montserrat_font">

                        <div class="details_container">

                            <div class="details_container_info">


                                <div class="main_content_navbar">
                                    <?php

                                    require_once __DIR__ . '/inc/_main_content_navbar.php';

                                    ?>
                                </div>


                                <div class="container">
                                    <div class="title_section">
                                        <div class="section_title fs-4 text-center mt-4 inter-font">
                                            Meetings Hub
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section ">
                                    <div class="container m-4   pe-5">
                                        <div class="meetings_main_section">
                                            <div class="meetings_content">
                                                <div class="meetings_content">
  <div class="container mb-4 pb-4">
    
    <!-- Trigger button -->
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#meeting_canvas" aria-controls="meeting_canvas">
      🔳 Join Fullscreen Meeting
    </button>

    <!-- Hidden holder for iframe (default location) -->
    <div id="iframe_holder" style="display: none;">
      <iframe
        id="meeting_iframe"
        src="https://48ede080403ef2d0730c.vercel.app/63e94387-e424-477e-8904-312f3e78d928"
        width="100%"
        height="100%"
        style="border: 0; height: 100vh;"
        allow="camera; microphone; clipboard-read; clipboard-write; fullscreen; speaker; display-capture"
        allowfullscreen>
      </iframe>
    </div>

    <!-- Bootstrap Offcanvas -->
    <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="meeting_canvas" aria-labelledby="meetingCanvasLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="meetingCanvasLabel">Agora Meeting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body p-0" id="offcanvas_body">
        <!-- iframe will be moved here -->
      </div>
    </div>
  </div>
</div>

<!-- ✅ Script to move iframe in/out of offcanvas without reload -->
<script>
  const iframe = document.getElementById('meeting_iframe');
  const iframeHolder = document.getElementById('iframe_holder');
  const offcanvasBody = document.getElementById('offcanvas_body');

  // Move iframe into offcanvas on show
  document.getElementById('meeting_canvas').addEventListener('shown.bs.offcanvas', () => {
    // offcanvasBody.appendChild(iframe);
    offcanvasBody.appendChild(iframeHolder);
    iframe.style.display = "block";
  });

  // Move iframe back to original holder on hide
  document.getElementById('meeting_canvas').addEventListener('hidden.bs.offcanvas', () => {
    // iframeHolder.appendChild(iframe);
    iframe.style.display = "none"; // Optional: hide when not in use
  });
</script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <script>
  const iframe = document.getElementById('meeting_iframe');
  const originalHolder = document.getElementById('iframe_holder');
  const offcanvasBody = document.getElementById('offcanvas_body');

  // When the offcanvas opens, move the iframe into it
  document.getElementById('meeting_canvas').addEventListener('shown.bs.offcanvas', () => {
    offcanvasBody.appendChild(iframe);
  });

  // When the offcanvas closes, move the iframe back to original place
  document.getElementById('meeting_canvas').addEventListener('hidden.bs.offcanvas', () => {
    originalHolder.appendChild(iframe);
  });
</script> -->








                            </div>

                        </div>





                    </div>



                </div>
            </div>
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/inc/_footer.php';

require_once __DIR__ . '/inc/_footer_scripts.php';

?>