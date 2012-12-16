 $(document).ready(function() { 				

    /*
     * Initialize nested sortable plugin
     * this will be used to sort the categories
     */
    $('ol.sortable').nestedSortable({
			disableNesting: 'no-nest',
			forcePlaceholderSize: true,
			handle: 'div',
			helper:	'clone',
			items: 'li',
			maxLevels: 0,
			opacity: .6,
			placeholder: 'placeholder',
			revert: 250,
			tabSize: 25,
			tolerance: 'pointer',
			toleranceElement: '> div'
    });

    /*
     * Ajax Update Request to save the changed
     * categories
     */
    $('#save_sort_order').click(function(){
        serialized = $('ol.sortable').nestedSortable('serialize');
        $.ajax({
            url: baseURL+"index.php/category/admin/ajax/update",
            type: "POST",
            data: serialized,
            dataType: 'json',
            success: function (data) 
            {

                if (data['valid'] == true)
                {
                    setNotification('success', data['prefix'], data['message']);
                }
                else
                {
                    setNotification('error', data['prefix'], data['message']);
                }
            }
        });
    });
    
    /*
     * Ajax Update for the Category field and
     * the Parent Link field in the Menu Management
     */
    $("#admin_parent_category").change(function() 
    {
        $("#admin_parent_links").html("");
        $.ajax({
            type: "POST",
            url: baseURL+"index.php/menu/admin/ajax/EntriesByCategory",
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
    
    /*
     * Ajax Update to activate the selected Tutorials on
     * the Overview page without reloading the page
     */
    $(".activate_tutorial").on('click',function() 
    {
        var id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: baseURL+"index.php/tutorials/admin/ajax/ActivateTutorial",
            dataType: "json",
            data: "id="+id,
            context: this,
            
            success:function(data) 
            {
                if (data['valid'] == true)
                {
                    setNotification('success', data['prefix'], data['message']);
                    $(this).html("");
                    $(this).parent().html("<a href=\""+baseURL+"admin/tutorials/edit/"+id+"\" class=\"deactivate_tutorial\" id=\""+id+"\">Deactivate</a>");  
                    $(document).on('click', '.deactivate_tutorial', function(){
                        deactivateTutorial(id);
                        return false;
                    });
                }
                else
                {
                    setNotification('error', data['prefix'], data['message']);
                    return false;
                }
            }
        });
        
        return false;
    });
    
    /*
     * Ajax Update to deactivate the selected Tutorial on
     * the Overview page without reloading the page
     */
    $(".deactivate_tutorial").on('click', function() 
    {
        var id = $(this).attr('id');
            
        $.ajax({
            type: "POST",
            url: baseURL+"index.php/tutorials/admin/ajax/DeactivateTutorial",
            dataType: "json",
            data: "id="+id,
            context: this, 
            
            success:function(data) 
            {
                if (data['valid'] == true)
                {
                    setNotification('success', data['prefix'], data['message']);
                    $(this).html("");
                    $(this).parent().html("<a href=\""+baseURL+"admin/tutorials/edit/"+id+"\" class=\"activate_tutorial\" id=\""+id+"\">Activate</a>");  
                    $(document).on('click', '.activate_tutorial', function(){
                        activateTutorial(id);
                        return false;
                    });
                }
                else
                {
                    setNotification('error', data['prefix'], data['message']);
                    return false;
                }
            }
        });
        
        return false;
    });
    
    /*
     * Ajax Update to deactivate the selected Tutorial on
     * the Overview page without reloading the page
     */
    $(".delete_tutorial").on('click', function() 
    {
        var id = $(this).attr('id');
            
        $.ajax({
            type: "POST",
            url: baseURL+"index.php/tutorials/admin/ajax/DeleteTutorial",
            dataType: "json",
            data: "id="+id,
            context: this, 
            
            success:function(data) 
            {
                if (data['valid'] == true)
                {
                    setNotification('success', data['prefix'], data['message']);
                    $(this).parents('tr').hide();
                   
                }
                else
                {
                    setNotification('error', data['prefix'], data['message']);
                    return false;
                }
            }
        });
        
        return false;
    });
    
    $('.bs_tooltip').tooltip({
      selector: "a[rel=tooltip]"
    })
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



function activateTutorial(id) 
{

    $.ajax({
        type: "POST",
        url: baseURL+"index.php/tutorials/admin/ajax/ActivateTutorial",
        dataType: "json",
        data: "id="+id,
        success:function(data) 
        {
            if (data['valid'] == true)
            {
                setNotification('success', data['prefix'], data['message']);
                $('#'+id).html("");
                $('#'+id).parent().html("<a href=\""+baseURL+"admin/tutorials/edit/"+id+"\" class=\"deactivate_tutorial\" id=\""+id+"\">Deactivate</a>");  
                $(document).on('click', '.deactivate_tutorial', function(){
                    deactivateTutorial(id);
                    return false;
                });
            }
            else
            {
                setNotification('error', data['prefix'], data['message']);
                return false;
            }
        }
    });
    return false;
}

function deactivateTutorial(id) 
{    
    $.ajax({
        type: "POST",
        url: baseURL+"index.php/tutorials/admin/ajax/DeactivateTutorial",
        dataType: "json",
        data: "id="+id,
        success:function(data) 
        {
            if (data['valid'] == true)
            {
                setNotification('success', data['prefix'], data['message']);
                $('#'+id).html("");
                $('#'+id).parent().html("<a href=\""+baseURL+"admin/tutorials/edit/"+id+"\" class=\"activate_tutorial\" id=\""+id+"\">Activate</a>");  
                $(document).on('click', '.activate_tutorial', function(){
                    activateTutorial(id);
                    return false;
                });
            }
            else
            {
                setNotification('error', data['prefix'], data['message']);
                return false;
            }
        }
    });
    return false;    
}