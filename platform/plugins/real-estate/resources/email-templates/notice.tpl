
<table>
    <tbody>
        <tr>
            <td class="wrapper" align="center">
                <table class="section" cellpadding="0" cellspacing="0" bgcolor="#f8f8f8">
                    <tr>
                        <td class="column" align="left">
                            <table>
                                <tbody>
                                <tr>
                                    <td align="left" style="padding: 20px 50px;">
                                        <p><strong>Bonjour , vous aviez une nouvelle consultation :</strong></p>
                                        <p>
                                            <label style="font-weight: bold;"> VISITEUR </label> <br>
                                            <span> {{ consult_name }} ({{ consult_ip_address }}) </span> 
                                        </p>
                                        <hr size="2">
                                        <p>
                                            <label style="font-weight: bold;"> EMAIL </label>   <br>
                                            <span> {{ consult_email }} </span> 
                                        </p>
                                        <hr size="2">
                                        <p>
                                            <label style="font-weight: bold;"> TELEPHONE </label>  <br>
                                            <span> {{ consult_phone }} </span> 
                                        </p>
                                        <hr size="2">
                                        <p>
                                            <label style="font-weight: bold;"> LIEN </label>  <br>
                                            <span> <a href="{{ consult_link }}">{{ consult_subject }}</a> </span> 
                                        </p>
                                        <hr size="2">
                                        <p>
                                            <label style="font-weight: bold;"> MESSAGE : </label>  <br>
                                            <span> {{ consult_content }} </span> 
                                        </p>
                                        <hr size="2">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

