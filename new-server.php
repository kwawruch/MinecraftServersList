<!DOCTYPE html>
<html>
    <head>
        <title>MinecraftList</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="autocomplete/tokenize2.css">
        <style>
            body {
                color: #dfd7cc;
            }
            label:not(.checkbox-label) {
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
            input[type=password] {
                width: 100%;
                padding: 8px 12px;
                color: white;
                border: none;
                border-bottom: 2px solid var(--main-color);
                border-radius: 8px;
            }
            .form-control {
                background: linear-gradient(180deg, rgba(2,0,36,0) 0%, rgba(0,0,0,0.30) 100%);
                border: none;
                border-left: 2px solid var(--main-color);
                border-right: 2px solid var(--main-color);
                border-radius: 10px;
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
                                    Dodaj nowy serwer
                                </div>
                            </div>
                            <div class="panel-content pb-5">
                                <p style="padding-left: 20px;">
                                    Pola oznaczone <span style="color:red"> * </span> s?? wymagane.
                                </p>
                                <div>
                                    <p class="second-header mb-0">Weryfikacja</p>
                                    <p>Przed przej??ciem do wype??niania dalszej cz??sci formularza ustaw swojemu serwerowi nast??puj??cy MOTD (Message of the day - Wiadomo???? dnia)</p>
                                    <h3 id="desired-motd">www.minecraft-list.pl#<span id="user-name"></span></h3>
                                    <p>Weryfikacja jest konieczna, aby pewne by??o, ??e serwer, kt??ry dodajesz na list?? nale??y do Ciebie</p>
                                    <button class="simple-button" onclick="CheckServerMotd()">Sprawd?? MOTD</button>
                                    <p id="motd-response"></p>
                                </div>
                                <div>
                                    <p class="second-header mb-0">Nazwa i adres serwera</p>
                                    <div class="mx-auto" style="max-width: 500px; width: 100%; padding: 20px 15px;">
                                        <div>
                                            <label for="addserver-servername" id="addserver-servername-label">Nazwa serwera</label>
                                            <input type="text" id="addserver-servername" placeholder="Minecraft Server">
                                        </div>
                                        <div>
                                            <label for="addserver-ip" id="addserver-ip-label">Adres IP lub domena serwera</label>
                                            <input type="text" id="addserver-ip" placeholder="m??j-server.pl">
                                        </div>
                                        <div>
                                            <label for="addserver-port" id="addserver-port-label">Port</label>
                                            <input type="text" id="addserver-port" value="25565" placeholder="Domy??lnie 25565">
                                        </div>
                                        <div class="mt-3">
                                            <input type="checkbox" id="addserver-onlinemode">
                                            <label for="addserver-onlinemode" class="checkbox-label">Online Mode</label>
                                        </div>
                                        <div id="server-gamemodes-div">
                                            <label for="server-gamemode" id="server-gamemode-label" style="top:0;">Tryb gry</label>
                                            <select class="demo2" id="server-gamemode" multiple>
                                            </select>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="addserver-ping-versions">
                                            <label for="addserver-ping-versions" class="checkbox-label">R??cznie dodam wersj?? serwera</label>
                                            <p class="mb-0" style="opacity: 0.5">Je??li ta opcja jest odznaczona, nasz system zrobi to automatycznie</p>
                                        </div>
                                        <div id="server-versions-div" style="display: none;">
                                            <label for="server-versions" id="server-versions-label" style="top:0;">Wersj?? serwera</label>
                                            <select class="demo1" id="server-versions" multiple>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="second-header mb-0">Socialmedia</p>
                                    <div  class="mx-auto" style="max-width: 500px; width: 100%; padding: 20px 15px;">
                                        <div>
                                            <label for="addserver-website" id="addserver-website-label">Strona serwera</label>
                                            <input type="text" id="addserver-website" placeholder="http://example.com">
                                            <label for="addserver-website" style="font-size:70%; color: #b9b9b9; position: relative; top: -5px">Adres URL musi zawiera?? <b>http://</b> na pocz??tku.</label>
                                        </div>
                                        <div>
                                            <label for="addserver-discord-server" id="addserver-discord-server-label">Link do Discorda serwera</label>
                                            <input type="text" id="addserver-discord-server" placeholder="http://example.com">
                                            <label for="addserver-discord-server" style="font-size:70%; color: #b9b9b9; position: relative; top: -5px">Adres URL musi zawiera?? <b>https://</b> na pocz??tku.</label>
                                        </div>
                                        <div>
                                            <label for="addserver-facebook-server" id="addserver-facebook-server-label">Link do strony serwera na Facebooku</label>
                                            <input type="text" id="addserver-facebook-server" placeholder="http://example.com">
                                            <label for="addserver-facebook-server" style="font-size:70%; color: #b9b9b9; position: relative; top: -5px">Adres URL musi zawiera?? <b>https://</b> na pocz??tku.</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="second-header mb-0 d-flex">
                                        <p class="mb-0" style="margin-right: auto;">Dodatkowe informacje o serwerze</p>
                                        <p class="mb-0" style="padding-right: 20px">Pozosta??o <span id="addserver-desc-chars">5000</span> znak??w</p>
                                    </div>
                                    <div>
                                        <textarea name="addserver-desc" id="addserver-desc" rows="10" placeholder="Tw??j opis serwera..."
                                        style="background: transparent; color: white; width: 100%; padding: 10px"></textarea>
                                    </div>

                                </div>
                                <div>
                                    <p class="second-header mb-0">
                                        Dodaj serwer do listy
                                    </p>
                                    <button class="simple-button d-block" style="float:right" onclick="OnCreate(event)">Dodaj serwer</button>
                                </div>

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
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script src="autocomplete/tokenize2.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6Ldj08kkAAAAAOAR7XBwQsbBnsFMfQFGAwE5qusl"></script>
        <script>
            var api_url = "<?php echo $api ?>";
            var data;
            var userData;
            var gamemodes = [];
            var versions = [];

            GetMinecraftAllGameModes();
            $('#nav-serwery').addClass('active');

            $('#addserver-desc').on('input', function() {
                $('#addserver-desc-chars').text(5000 - $('#addserver-desc').val().length );
            })

            $.ajax({
                url: api_url+'/api/v1/auth/logged/',
                xhrFields: {
                        withCredentials: true
                    },
                complete: function(xhr, textStatus) {
                    if(xhr.status != "200") 
                        window.location.replace("auth.php");
                } 
            }).done(res => {
                userData = res;
                $('#user-name').text(userData.login);

                $('.demo2').tokenize2({
                    sortable: true,
                    placeholder: "Zacznij wpisywa??..."
                });
                $('.demo1').tokenize2({
                    sortable: true,
                    placeholder: "Zacznij wpisywa??..."
                });
             })

            function CheckServerMotd() {
                $('#motd-response').empty();
                var serverIp = $('#addserver-ip').val();
                if(serverIp == '') {
                    $('#motd-response').text("Ip serwera nie zosta??o ustawione poni??ej");
                    return;
                }
                    
                var serverPort = $('#addserver-port').val();
                if(serverIp == '') {
                    $('#motd-response').text("Port serwera nie zosta?? ustawiony poni??ej");
                    return;
                }
                   
                var mcapi_url = 'https://mcapi.us/server/status?ip='+serverIp+'&port='+serverPort;

                $.ajax({
                    url: mcapi_url,
                    xhrFields: {
                        withCredentials: true
                    },
                }).done(res => {
                    if(res.status == 'error')  {
                        $('#motd-response').text("Error. Prawdopodobnie nie odnaleziono serwera");
                        return;
                    }
                    if(res.motd_json != $('#desired-motd').text()) {
                        var desired_motd = $("#desired-motd").text();
                        $('#motd-response').append($('<p>MOTD nie zosta?? ustawiony poprawnie<br> Wymagany MOTD: '+desired_motd+'<br>Twoje MOTD: '+res.motd_json+'</p>'));
                        return;
                    }
                    $('#motd-response').append($('<p color="var(--main-color)">MOTD zosta??o zweryfikowane</p>'))
                        
                })
            }

            function OnCreate(e) {
                e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Ldj08kkAAAAAOAR7XBwQsbBnsFMfQFGAwE5qusl', {action: 'submit'}).then(function(token) {
                        CreateNewServer(token);
                    });
                });
            }

            //Funkcja zwaraj??ca wszystkie oficialne wersje serwer??w mc
            async function GetMinecraftAllVersions() {
                await $.ajax({
                    url: api_url+'/api/v1/servers/versions/',
                    xhrFields: {
                        withCredentials: true
                    },
                }).done(res => {
                    res.forEach(x => $('#server-versions').append($('<option value="'+x.version+'">'+x.version+'</option>')));
                })
            }
            //Versions
            function GetVersionsFromInput() {
                var htmlArray = $('#server-versions-div').children('.tokenize').children('.tokens-container').children('li.token');
                for(var i = 0; i<htmlArray.length; i++) {
                    versions[i] = htmlArray[i].attributes[1].textContent;
                }
            }
            $('#addserver-ping-versions').on('change', function() {
                console.log("Git");
                if($('#addserver-ping-versions').prop('checked'))
                    $('#server-versions-div').css('display','block');
                else 
                    $('#server-versions-div').css('display','none');
            })

            //Gamemodes
            function GetGameModesFromInput() {
                var htmlArray = $('#server-gamemodes-div').children('.tokenize').children('.tokens-container').children('li.token');
                for(var i = 0; i<htmlArray.length; i++) {
                    gamemodes[i] = htmlArray[i].attributes[1].textContent;
                }
            }
            async function GetMinecraftAllGameModes() {
                $.ajax({
                    url: api_url+'/api/v2/game-modes/?status=ACCEPTED',
                    xhrFields: {
                        withCredentials: true
                    },
                }).done(res => {
                    res.content.forEach(x => $('#server-gamemode').append($('<option value="'+x.id+'">'+x.gameMode+'</option>')));
                });
            }
            function DeleteElement(id) {
                $('li.token[data-value="'+id+'"]').remove();
            }

            //Create Server
            function CreateNewServer(token) {
                var servername = $('#addserver-servername').val();
                var ip = $('#addserver-ip').val();
                var port = $('#addserver-port').val();
                var isOnlineMode = $('#addserver-onlinemode').prop('checked');
                var homepage = $('#addserver-website').val();
                var discordServer = $('#addserver-discord-server').val();
                var facebookServer = $('#addserver-facebook-server').val();
                var desc = $('#addserver-desc').val();
                var pingVersions = $('#addserver-ping-versions').prop('checked');
                GetGameModesFromInput();
                if(pingVersions) GetVersionsFromInput();

                $.ajax({
                    type: 'POST',
                    url: api_url+'/api/v1/servers/',
                    dataType: 'json',
                    xhrFields: {
                        withCredentials: true
                    },
                    contentType: "application/json; charset=utf-8",
                    data: '{"hostCredentials": {"host": "'+ip+'","port": '+port+',"address": "'+ip+'"},"serverCredentials": {"name": "'+servername+'","description": "'+desc+'","homepage": "'+homepage+'","facebook": "'+facebookServer+'","discord": "'+discordServer+'","isOnlineModeEnabled": '+isOnlineMode+',"pingVersions": '+pingVersions+'},"gameModeCredentials": {"gameModeIds": '+ReturnStringArray(gamemodes)+'},"versionCredentials": {"versions": '+ReturnStringArray(versions)+'}, "gResponse": "'+token+'"}',
                    complete: function(xhr, textStatus) {
                        console.log("Complete: "+xhr.status + " " +textStatus);
                        if(xhr.status == 200) {
                            alert('Serwer zosta?? dodany');
                            window.location.replace("index.php");
                        }
                        else alert(xhr.responseJSON.message);
                    } 
                });
            }

            function ReturnStringArray(arr) {
                var str = '[';
                for(var i=0; i<arr.length;i++) {
                    str+='"'+arr[i]+'"';
                    if(i != arr.length-1) str+=','
                }
                str+=']'
                return str;
            }

            GetMinecraftAllVersions()

        </script>
    </body>
</html>
