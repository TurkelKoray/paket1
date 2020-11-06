 $(function(){


        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "3500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        var durum = parseInt($("body").data("status"));

        switch (durum)
        {
            case 0 :
                toastr.error('Hata oluştu');
                break;
            case 1 :
                toastr.success('İşlem başarılı.');
                break;
            case 2 :
                toastr.info('İşlem başarılı fakat yönetici onayladıktan sonra aktifleşecektir.');
                break;

            case 3 :
                toastr.warning('Zaten veritabanında kayıtlıdır');
                break;
            case 4 :
                toastr.info('Dil değiştirildi.');
                break;
            case 5 :
                toastr.info('Lütfen (png,jpg ve gif ) uzantılı dosya seçmelisiniz.');
                break;
            case 6 :
                toastr.info('Bu Haber Daha önceden Eklenmiş');
                break;
            case 7 :
                toastr.success('Dosya Başarılı Bir Şekilde Yüklenmiştir.');
                break;
            case 8 :
                toastr.info('Lütfen uygun formatta  dosya seçiniz (pdf,xls,doc,docx)');
                break;
            case 9 :
                toastr.info('Lütfen dosya seçiniz');
                break;



        }

        $('[data-toggle="tooltip"]').tooltip();





    });
