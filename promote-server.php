<!DOCTYPE html>
<html>
    <head>
        <title>MinecraftList</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <style>
            body {
                color: #dfd7cc;
            }
            label:not(.not-label) {
                margin-top: 10px;
                width: 100%;
                color: var(--href-color);
                position: relative;
                top: 10px;
            }
            .panel-content > div > *:not(.second-header) {
                padding: 10px 30px;
            }
            .second-header {
                padding-left: 20px;
            }
            input[type=text],
            input[type=password],
            input[type=number] {
                width: 100%;
                padding: 8px 12px;
                color: white;
                border: none;
                border-bottom: 2px solid var(--main-color);
                border-radius: 8px;
            }
            select {
                width: 100%;
                background-color: #110b08;
                color: white;
                padding: 2px 5px;
                border: 1px solid #110b08;
                border-bottom: 2px solid var(--main-color);
                border-radius: 8px;
            }
            select:focus {
                outline: none;
            }
            .panel li::marker {
                content: '> ';
                font-size: 120%;
                font-weight: bold;
                color: var(--main-color);
            }

            .promote-item {
                width: calc(50% - 30px);
                margin: 15px;
                padding: 20px;
                transition: all 0.2s ease-in;
                border-radius: 5px;
            }
            .promote-item:hover {
                margin: 10px 20px 20px 10px;
            }
            .bronze:hover {
                box-shadow: 5px 5px 10px rgba(223, 138, 20, 0.5);
            }
            .silver:hover {
                box-shadow: 5px 5px 10px rgba(179, 179, 179, 1);
            }
            .gold:hover {
                box-shadow: 5px 5px 10px rgba(197, 177, 0, 1);
            }
            .diamond:hover {
                box-shadow: 5px 5px 10px rgba(21, 213, 213, 1);
            }
            .promote-item-header {
                padding: 10px 5px;
                border-bottom: 1px solid var(--main-color);
            }
            .promote-item-header div:first-child {
                font-size: 150%;
                font-weight: bold;
            }
            .promote-item-header div:nth-child(2) {
                text-align: right;
            }
            .promote-item-content {
                padding: 10px 5px;
            }
            .promote-item-footer {
                padding: 10px;
                margin: 10px 0px;
            }
            .promote-item-footer > button {
                margin-left: auto;
                margin-right: auto;
                display: block;
            }

        </style>
    </head>
    <body>
        <?php $api = require("config.php"); ?>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v11.0&appId=915876171902531&autoLogAppEvents=1" nonce="k7fGxMia"></script>
        <?php require_once("components/top.php"); ?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col col-12">
                        <div class="panel">
                            <div class="panel-header">
                                <div class="panel-header-title">
                                    Promuj sw??j serwer
                                </div>
                            </div>
                            <div class="panel-content pb-5">
                                <div>
                                    <h2>Promowanie serwera</h2>
                                    <p class="mb-0 pb-0">Na czym polega i co zyskujesz na umieszczeniu swojego serwera na li??cie serwer??w promowanych:</p>
                                    <ul class="mx-3">
                                        <li>
                                            Go??cie odwiedzaj??cy nasz serwis mog?? obejrze?? wszystkie promowane serwery w galerii na g??rze strony. System rozpoczyna prezentacj?? od ostatno wy??wietlonego serwera, indywidualnie dla ka??dego go??cia odwiedzaj??cego nasz serwis.
                                        </li>
                                        <li>
                                            Serwer jest wyr????niony na li??cie wszystkich serwer??w
                                        </li>
                                        <li>
                                            Gracze zauwa??aj?? to, ??e inwestujesz w rozw??j i promocj?? swojego serwera
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="second-header mb-0 pr-4" style="padding-right: 20px;">
                                        <p class="mb-0">Promuj serwer</p>
                                    </div>
                                    <div class="mx-auto" style="max-width: 500px; width: 100%; padding: 20px 15px;" id="form">
                                        <div>
                                            <label for="serverId" style="top:0;">Serwer</label>
                                            <select id="serverId" name="serverId">
                                                <option value="Brak" selected disabled>Wybierz</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="method" style="top:0;">Forma p??atno??ci</label>
                                            <select id="method" class="calculate-price" name="method">
                                                <option value="Brak" selected disabled>Wybierz</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="daysToReserve">Dni promowania</label>
                                            <select id="daysToReserve" class="calculate-price" name="daysToReserve">
                                                <option value="Brak" selected disabled>Wybierz</option>
                                                <option value="3">3 dni</option>
                                                <option value="7">7 dni</option>
                                                <option value="14">14 dni</option>
                                                <option value="30">30 dni</option>
                                                <option value="60">60 dni</option>
                                                <option value="90">90 dni</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="promotionalCode">Kod promocyjny</label>
                                            <input type="text" id="promotionalCode" class="calculate-price" name="promotionalCode">
                                        </div>
                                        <div class="mt-3">
                                            <p style="text-align: right">Cena: <span id="calculated-price">0</span> z??</p>
                                        </div>
                                        <div id="createAd-response"></div>
                                        <div>
                                            <input type="button" value="Promuj serwer" class="simple-button mx-auto" onclick="SendData()">
                                        </div>
                                    </div>
                                </div>
                                <!-- PAKIETY PROMOWANIA 
                                <div>
                                    <p class="second-header mb-0">Pakiety promowania</p>
                                    <div class="row">
                                        <div class="promote-item bronze">
                                            <div class="promote-item-header row">
                                                <div class="col">Pakiet Bronze</div>
                                                <div class="col">token-img 1000</div>
                                            </div>
                                            <div class="promote-item-content row">
                                                <div class="col col-12">
                                                    <p>Pakiet, dzi??ki kt??remy otrzymujesz mo??liwo???? umieszczenia swojego serwera na li??cie serwer??w promowanych na 3 dni w zamian za <b>1000</b> Token??w.</p>
                                                    
                                                </div>
                                                <div class="col col-12">
                                                    <label for="promote-bronze-select" id="promote-bronze-select" style="top:0">Metoda p??atno??ci</label>
                                                    <select name="promote-bronze-select" id="promote-bronze-select">
                                                        <option value="Brak" selected disabled>Wybierz serwer</option>
                                                        <option value="ID">hypixel.com</option>
                                                        <option value="ID2">hakuna-matata.pl</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="promote-item-footer">
                                                <button class="simple-button ">Promuj serwer</button>
                                            </div>
                                        </div>
                                        <div class="promote-item silver">
                                            <div class="promote-item-header row">
                                                <div class="col">Pakiet Silver</div>
                                                <div class="col">token-img 2000</div>
                                            </div>
                                            <div class="promote-item-content row">
                                                <div class="col col-12">
                                                    <p>Pakiet, dzi??ki kt??remy otrzymujesz mo??liwo???? umieszczenia swojego serwera na li??cie serwer??w promowanych na 7 dni w zamian za <b>2000</b> Token??w.</p>
                                                    
                                                </div>
                                                <div class="col col-12">
                                                    <label for="promote-silver-select" id="promote-silver-select" style="top:0">Metoda p??atno??ci</label>
                                                    <select name="promote-silver-select" id="promote-silver-select">
                                                        <option value="Brak" selected disabled>Wybierz serwer</option>
                                                        <option value="ID">hypixel.com</option>
                                                        <option value="ID2">hakuna-matata.pl</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="promote-item-footer">
                                                <button class="simple-button ">Promuj serwer</button>
                                            </div>
                                        </div>
                                        <div class="promote-item gold">
                                            <div class="promote-item-header row">
                                                <div class="col">Pakiet Gold</div>
                                                <div class="col">token-img 3200</div>
                                            </div>
                                            <div class="promote-item-content row">
                                                <div class="col col-12">
                                                    <p>Pakiet, dzi??ki kt??remy otrzymujesz mo??liwo???? umieszczenia swojego serwera na li??cie serwer??w promowanych na 14 dni w zamian za <b>3200</b> Token??w.</p>
                                                    
                                                </div>
                                                <div class="col col-12">
                                                    <label for="promote-gold-select" id="promote-gold-select" style="top:0">Metoda p??atno??ci</label>
                                                    <select name="promote-gold-select" id="promote-gold-select">
                                                        <option value="Brak" selected disabled>Wybierz serwer</option>
                                                        <option value="ID">hypixel.com</option>
                                                        <option value="ID2">hakuna-matata.pl</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="promote-item-footer">
                                                <button class="simple-button ">Promuj serwer</button>
                                            </div>
                                        </div>
                                        <div class="promote-item diamond">
                                            <div class="promote-item-header row">
                                                <div class="col">Pakiet Diamond</div>
                                                <div class="col">token-img 6000</div>
                                            </div>
                                            <div class="promote-item-content row">
                                                <div class="col col-12">
                                                    <p>Pakiet, dzi??ki kt??remy otrzymujesz mo??liwo???? umieszczenia swojego serwera na li??cie serwer??w promowanych na 3 dni w zamian za <b>6000</b> Token??w.</p>
                                                    
                                                </div>
                                                <div class="col col-12">
                                                    <label for="promote-diamond-select" id="promote-diamond-select" style="top:0">Metoda p??atno??ci</label>
                                                    <select name="promote-diamond-select" id="promote-diamond-select">
                                                        <option value="Brak" selected disabled>Wybierz serwer</option>
                                                        <option value="ID">hypixel.com</option>
                                                        <option value="ID2">hakuna-matata.pl</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="promote-item-footer">
                                                <button class="simple-button ">Promuj serwer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="container">

            </div>
        </footer>
        <div class="copyright">
            Lista serwer??w Minecraft, spis serwer??w Minecraft, prywatne serwery Minecraft, serwery Minecraft - &copy; Copyright 2013-2021
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="js/payment-services.js"></script>
        <script>
            var api_url = "<?php echo $api ?>";
            var data;
            $('#nav-serwery').addClass('active');    
            $.ajax({
                url: api_url+'/api/v1/auth/logged/',
                xhrFields: {
                        withCredentials: true
                    },
                complete: function(xhr, textStatus) {
                    if(xhr.status != "200") 
                        window.location.replace("auth.php");
                } 
            });
            
            $('.calculate-price').on('change', function() {
                if($('#method').val() == null) return;
                if($('#daysToReserve').val() == null) return;

                var fullUrl = api_url+'/api/v1/promote-payments/calculate/?days='+$("#daysToReserve").val()+'&method='+$('#method').val();
                if($('#promotionalCode').val() != '') fullUrl += '&promotionalCode='+$('#promotionalCode').val();

                $.ajax({
                    url: fullUrl,
                    xhrFields: {
                        withCredentials: true
                    },
                }).done(res=>{
                    $('#calculated-price').text(res.price);
                })
            })

            function SendData() {
                var server = $('#serverId').val();
                var paymentMethod = $('#method').val();
                var days = $('#daysToReserve').val();
                var code = $('#promotionalCode').val();
                if(server == null) {
                    alert('Nie wybrano serwera');
                    return;
                }
                if(paymentMethod == null) {
                    alert('Nie wybrano typu p??atno??ci');
                    return;
                }
                if(days == '' || days == null) {
                    alert('Nie podano ilo??ci dni');
                    return;
                }
                if(code == '') code = null;

                $.ajax({
                    url : api_url+'/api/v1/promote-payments/',
                    type: 'POST',
                    dataType: 'json',
                    xhrFields: {
                        withCredentials: true
                    },
                    contentType: "application/json; charset=utf-8",
                    data: `{"method": "${paymentMethod}","days": ${days},"serverId": "${server}","promoCode": ${code ? null : '"'+code+'"'}}`,
                    success : function(data) {
                    },
                    complete: function(xhr, textStatus) {
                        if(xhr.status != 200) $('#createAd-response').html($('<p class="mt-3" style="color: red">'+xhr.responseJSON.message+'</p>'));
                    }
                }).done(res => {
                    console.log(res);
                    var win = window.open(res.payment.url, '_blank');
                    if (win) {
                        win.focus();
                    } else {
                        alert('Wymagane zezwolenie na wyskakuj??ce okna na stronie. W celu dokonania p??atno??ci kliknij w pulsuj??cy zielony guzik');
                    }
                    $('#form').append($('<div><a href="'+res.payment.url+'" class="btn-green">Przejd?? do p??atno??ci</a></div>'));
                })  
            }

            async function ShowOwnerServers() {
                await $.ajax({
                    url: api_url+'/api/v1/servers/own/',
                    xhrFields: {
                        withCredentials: true
                    },
                }).done(res => {
                    data = res;
                    if(data.content.length == 0) return;
                    data.content.forEach(x => {
                        $('#serverId').append($('<option value="'+x.server.id+'">'+x.server.name+'</option>'));   
                    });
                })
            }

            GeneratePaymentTypes();
            ShowOwnerServers();
        </script>
    </body>
</html>