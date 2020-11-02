<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ASTİM OSB</title>
    <style>
        body{font-size:14px;margin:0;padding:0;color:#343434;font-family:Arial;line-height:160%;}
        a{text-decoration:none;color:#414141;}a:hover{color:#000!important;}
        p{margin:0;font-size:17px;color:#292929;}
        p b{font-size:20px;}
        b span{color:#a3a3a3;}
        table tr td{vertical-align:middle!important;vertical-align:middle;}
    </style>
</head>
<body>
<table style="max-width:500px;border:1px solid #e1e1e1;background-color:#fafafa;padding:15px 30px;" cellpadding="8" cellspacing="0" border="0" align="center">
    <tbody>
    <tr>
        <td align="center" colspan="3">
            <img src="{{ asset('images/logo.png') }}" border="0" style="margin:0 auto;" />
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <p style="margin-bottom:10px;">{{ $name }} kişisi tarafından epostanız bulunmaktadır.</p>
        </td>
    </tr>
    <tr style="margin-top:15px;"><td style="border-bottom:1px solid #e1e1e1;" colspan="3"></td></tr><tr style="margin-top:15px;" colspan="3"><td></td></tr>
    <tr>
        <td colspan="3">
            <span>Adı Soyadı <b style="color:#000;">{{ $name }}</b></span><br />
            <span>E-Posta, <b>{{ $email }}</b></span><br />
            <span>Telefon, <b> {{ $phone }} </b></span><br />
            <span>Mesaj, <b>{{ $mesaj }}</b></span><br />
        </td>
    </tr>
    <tr style="margin-top:15px;"><td style="border-bottom:1px solid #e1e1e1;" colspan="3"></td></tr><tr style="margin-top:15px;" colspan="3"><td></td></tr>



    </tbody>
</table>

</body>
</html>
