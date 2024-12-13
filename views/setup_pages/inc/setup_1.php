<div class="welcome_section fs-4 text-center">
    Welcome to NexGenProjects setup wizerd
</div>
<div class="sub_welcome_section fs-5 mt-4 text-center">
    Configure the software
</div>
<div class="description_section mt-4">
    Please give the all Configure informations respectively. All these data are needed to install the software
</div>
<div class="setup_box_main_section mt-4">
    <form action="?step=1" method="post">
        <div class="mb-4">
            <label for="server_name">Server Name</label>
            <input type="text" id="server_name" placeholder="By default server name = 'localhost'. Please give the server name and Configure if it is not localhost " name="server_name" class="form-control">
        </div>
        <div class="mb-4">
            <label for="server_user_name">Server User Name</label>
            <input type="text" id="server_user_name" placeholder="By default server user name = 'root'. Please give the server user name and Configure if it is not root " name="server_user_name" class="form-control">
        </div>
        <div class="mb-4">
            <label for="server_password">Server Password</label>
            <input type="text" id="server_password" placeholder="By default server password null, please leave the field as it is. If your server has a password, then please give it " name="server_password" class="form-control">
        </div>
        <div class="mb-4">
            <label for="database_name">Database Name</label>
            <input type="text" id="database_name" placeholder="By default database name = 'nexgenproject_2.0', please leave the field as it is. If your database has different_name, then please give it " name="database_name" class="form-control">
        </div>

        <div class="mb-4">
            <button type="submit" name="save_server_config" class="btn btn-success">Save Configuration</button>
        </div>
    </form>
</div>