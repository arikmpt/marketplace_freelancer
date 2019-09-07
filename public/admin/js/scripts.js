save = (data, route, token) => {
    var ajax = new Promise(function(resolve,reject) {
            $.ajax({
            headers: {
                'X-CSRF-Token': token
            },
            url: route, 
            type: "POST",             
            data: data,
            success : function(result) {
                resolve(result)
            },
            error : function(err) {
                reject(err)
            }
        })
    })

    return ajax
}

update = (data, route, token) => {
    var ajax = new Promise(function(resolve,reject) {
            $.ajax({
            headers: {
                'X-CSRF-Token': token
            },
            url: route, 
            type: "PUT",             
            data: data,
            success : function(result) {
                resolve(result)
            },
            error : function(err) {
                reject(err)
            }
        })
    })

    return ajax
}

remove = (data, route, token) => {
    var ajax = new Promise(function(resolve,reject) {
        $.ajax({
            method: 'DELETE',
            headers: {
                'X-CSRF-Token': token
            },
            url: route,
            dataType: 'JSON',
            cache: false,
            data: {id: data},
            success: function(result) {
                resolve(result)
            },
            error: function(err){
                reject(err)
            }
        });
    })
    return ajax
}

success = (message) => {
    var toast = $.toast({
        heading : 'Success !!',
        text : message,
        position: 'top-right',
		loaderBg:'#4dad44',
		icon: 'success',
		hideAfter: 3500,
    })

    return toast
}

fail = (message) => {
    var toast = $.toast({
        heading: 'Opps! ',
        text: message,
        position: 'top-right',
        loaderBg:'#ff354d',
        icon: 'error',
        hideAfter: 3500
    });

    return toast
}
