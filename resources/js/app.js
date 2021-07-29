window.$ = require('jquery');
import Swal from 'sweetalert2';
require('./bootstrap');

$(document).ready(function(){
const token=$(`meta[name="csrf-token"]`).attr('content');
const url=$('body').attr('data-url');

$("#form-mail-send-teacher").on("submit",function(e){
    e.preventDefault();
    const formdata=$(this).serialize();
    const formUrl=$(this).attr('action');
    $.ajax({
        url:formUrl,
        type:'post',
        dataType: 'json',
        data:formdata,
        success:function(data){
        if(data.status=='ok'){
            Swal.fire(
                'Success !',
                data.message,
                'success'
              ).then(()=>{
                window.location.reload();
              })
        }else{
            Swal.fire(
                'Failed !',
                data.data,
                'error'
              )
        }
        },
        error:function(){
            Swal.fire(
                'Failed !',
                data.message,
                'error'
              )
        }
    })

    // Swal.fire({
    //     icon: 'warning',
    //     text: 'Do you want to delete this?',
    //     showCancelButton: true,
    //     confirmButtonText: 'Delete',
    //     confirmButtonColor: '#e3342f',
    // }).then((result) => {
    //     if (result.isConfirmed) {

    //     }
    // });



})

$(".list-teacher").on("click",".remove-teacher",function(){
    const dataID=$(this).attr('data-id');
    Swal.fire({
        icon: 'warning',
        text: 'Do you want to delete this?',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:url+'/admin/member/'+dataID,
                type:'delete',
                dataType: 'json',
                data:{"_token": token},
                success:function(data){
                if(data.status=='ok'){
                    Swal.fire(
                        'Success !',
                        data.message,
                        'success'
                      ).then(()=>{
                        window.location.reload();
                      })
                }else{
                    Swal.fire(
                        'Failed !',
                        data.data,
                        'error'
                      )
                }
                },
                error:function(){
                    Swal.fire(
                        'Failed !',
                        data.message,
                        'error'
                      )
                }
            })
        }
    });
})
$(".list-student").on("click",".remove-student",function(){
    const dataID=$(this).attr('data-id');
    Swal.fire({
        icon: 'warning',
        text: 'Do you want to delete this?',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:url+'/admin/member/'+dataID,
                type:'delete',
                dataType: 'json',
                data:{"_token": token},
                success:function(data){
                if(data.status=='ok'){
                    Swal.fire(
                        'Success !',
                        data.message,
                        'success'
                      ).then(()=>{
                        window.location.reload();
                      })
                }else{
                    Swal.fire(
                        'Failed !',
                        data.data,
                        'error'
                      )
                }
                },
                error:function(){
                    Swal.fire(
                        'Failed !',
                        data.message,
                        'error'
                      )
                }
            })
        }
    });
});

$("#data-update-member").on("submit",function(e){
    e.preventDefault();
    const formdata=$(this).serialize();
    const formUrl=$(this).attr('action');
    $.ajax({
        url:formUrl,
        type:'PUT',
        dataType: 'json',
        data:formdata,
        success:function(data){
        if(data.status=='ok'){
            Swal.fire(
                'Success !',
                data.message,
                'success'
              ).then(()=>{
                window.location.href=`${url}/admin/member`;
              });
        }else{
            Swal.fire(
                'Failed !',
                data.data,
                'error'
              )
        }
        },
        error:function(){
            Swal.fire(
                'Failed !',
                data.message,
                'error'
              )
        }
    })

})


$("#login-members").on("submit",function(e){
    e.preventDefault();
    const formdata=$(this).serialize();
    const formUrl=$(this).attr('action');
    $.ajax({
        url:formUrl,
        type:'post',
        dataType: 'json',
        data:formdata,
        success:function(data){
        console.log(data);
        if(data.status=='ok'){
            Swal.fire(
                'Success !',
                data.message,
                'success'
              ).then(()=>{
                window.location.href=`${url}/admin/member`;
              });
        }else{
            Swal.fire(
                'Failed !',
                data.data,
                'error'
              )
        }
        },
        error:function(){
            Swal.fire(
                'Failed !',
                data.message,
                'error'
              )
        }
    })

})


})
