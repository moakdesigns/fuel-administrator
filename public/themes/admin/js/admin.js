 $(document).ready(function() { 				

    /*
     * Ajax Update for the Category field and
     * the Parent Link field in the Menu Management
     */
    $("#admin_parent_category").change(function() 
    {
        $("#admin_parent_links").html("");
        $.ajax({
            type: "POST",
            url: baseURL+"index.php/menu/ajax/EntriesByCategory",
            cache: true,
            dataType: "json",
            data: $("#admin_parent_category").serialize(),
            success:function(data) 
            {
                $.each( data, function(key, value)
                {
                   $("#admin_parent_links").append('<option value="'+value.id+'">'+value.displayname+'</option> \n');
                });        
            }
        });
    });
    
    


    /*  Show Notification message
     *
     *  type        success, warning, error, info
     *  prefix      Well Done!, Attention, Oh Snap!, Heads up
     *  message     your message
     */

    function setNotification(type, prefix, message) 
    {
        //remove all existing alerts
        $("#alerts").html("");
        
        //set new alert message
        $("#alerts").append($('<div class="alert alert-'+type+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+prefix+'</strong>&nbsp;'+message+'</div> \n'));
    }   
}