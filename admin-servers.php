
<!DOCTYPE html>
<html>
    <head>
        <title>MinecraftList</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="autocomplete/tokenize2.css">
        

        <style>
            body {
                color: #dfd7cc;
            }
            .panel-header a {
                color: var(--href-color);
                text-decoration: none;
            }

            button {
                color: var(--href-color);
            }
            tbody tr:hover {
                border-bottom: 1px solid var(--href-color);
                color: var(--href-color);
            }
            thead td {
                color: var(--href-color);
            }
            td i {
                font-size: 20px;
            }
            td a {
                color: inherit;
            }
            td a:hover {
                color: inherit;
            }
            .bi-trash3-fill {
                color: #ff4a61;
            }
            .bi-pencil-square {
                color: #fcf860;
            }
            .bi-card-text {
                color: #73d6fa;
            }

            label:not(.checkbox-label) {
                margin-top: 10px;
                width: 100%;
                color: var(--href-color);
                position: relative;
                top: 10px;
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
            #pagination-list li {
                cursor: pointer;
            }
            .form-control {
                background: linear-gradient(180deg, rgba(2,0,36,0) 0%, rgba(0,0,0,0.30) 100%);
                border: none;
                border-left: 2px solid var(--main-color);
                border-right: 2px solid var(--main-color);
                border-radius: 10px;
            }
            .body-version {
                transition: .3s;
            }
            .body-version:hover {
                cursor: help;
                color: var(--href-color2);
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
            <!-- MODAL DELETE -->
                                    <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="modal_delete" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Usuwanie serwera</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_delete').modal('toggle');">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Czy chcesz usun???? serwer <span id="modal_delete-server-name"></span>?</p>
                                                    <p id="modal_delete-server-id"></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" onclick="ModalDeleteAction()">Tak</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modal_delete').modal('toggle');">Anuluj</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            <!-- MODAL EDIT -->
                                    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edytowanie serwera</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_edit').modal('toggle');">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="modal_edit-server-id"></p>
                                                    <div class="mx-auto" style="max-width: 500px; width: 100%; padding: 20px 15px;">
                                                        <div>
                                                            <label for="modal_edit-servername" id="modal_edit-servername-label">Nazwa serwera</label>
                                                            <input type="text" id="modal_edit-servername">
                                                        </div>
                                                        <div>
                                                            <label for="modal_edit-ip" id="modal_edit-ip-label">Adres IP lub domena serwera</label>
                                                            <input type="text" id="modal_edit-ip">
                                                        </div>
                                                        <div>
                                                            <label for="modal_edit-port" id="modal_edit-port-label">Port</label>
                                                            <input type="text" id="modal_edit-port" value="25565">
                                                        </div>
                                                        <div class="mt-3">
                                                            <input type="checkbox" id="modal_edit-onlinemode">
                                                            <label for="modal_edit-onlinemode" class="checkbox-label">Online Mode</label>
                                                        </div>
                                                        <div>
                                                            <label for="modal_edit-website" id="modal_edit-website-label">Strona serwera</label>
                                                            <input type="text" id="modal_edit-website" placeholder="http://example.com">
                                                            <label for="modal_edit-website" style="font-size:70%; color: #b9b9b9; position: relative; top: -5px">Adres URL musi zawiera?? <b>http://</b> na pocz??tku.</label>
                                                        </div>
                                                        <div>
                                                            <label for="modal_edit-discord-server" id="modal_edit-discord-server-label">Link do Discorda serwera</label>
                                                            <input type="text" id="modal_edit-discord-server" placeholder="http://example.com">
                                                            <label for="modal_edit-discord-server" style="font-size:70%; color: #b9b9b9; position: relative; top: -5px">Adres URL musi zawiera?? <b>https://</b> na pocz??tku.</label>
                                                        </div>
                                                        <div>
                                                            <label for="modal_edit-facebook-server" id="modal_edit-facebook-server-label">Link do strony serwera na Facebooku</label>
                                                            <input type="text" id="modal_edit-facebook-server" placeholder="http://example.com">
                                                            <label for="modal_edit-facebook-server" style="font-size:70%; color: #b9b9b9; position: relative; top: -5px">Adres URL musi zawiera?? <b>https://</b> na pocz??tku.</label>
                                                        </div>
                                                        <div>
                                                            <textarea name="modal_edit-desc" id="modal_edit-desc" rows="10" placeholder="Tw??j opis serwera..."
                                                            style="background: transparent; color: white; width: 100%; padding: 10px"></textarea>
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" id="addserver-ping-versions">
                                                            <label for="addserver-ping-versions" class="checkbox-label">R??cznie dodam wersj?? serwera</label>
                                                            <p class="mb-0" style="opacity: 0.5; font-size: 13px;">Je??li ta opcja jest odznaczona, nasz system zrobi to automatycznie</p>
                                                        </div>
                                                        <div id="server-versions-div" style="display: none;">
                                                            <label for="server-versions" id="server-versions-label" style="top:0;">Wersj?? serwera</label>
                                                            <select class="demo1" id="server-versions" multiple>
                                                            </select>
                                                        </div>
                                                        <div id="server-gamemodes-div">
                                                            <label for="server-gamemode" id="server-gamemode-label" style="top:0;">Tryb gry</label>
                                                            <select class="demo2" id="server-gamemode" multiple>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" onclick="OnModalEditAction(event)">Zapisz</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modal_edit').modal('toggle');">Anuluj</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            <!-- MODAL HISTORY -->
                                    <div class="modal fade" id="modal_history" tabindex="-1" role="dialog" aria-labelledby="modal_history" aria-hidden="true">
                                        <div class="modal-dialog" role="document"  style="max-width: 900px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Historia zmian ip serwera</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_history').modal('toggle');">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="modal_history-server-id"></p>
                                                    <table class="w-100 px-3">
                                                        <thead>
                                                            <tr>
                                                                <td>Data</td>
                                                                <td>Wykonawca</td>
                                                                <td>Typ operacji</td>
                                                                <td>Ip</td>
                                                                <td>Nowe Ip</td>
                                                                <td>P??atno????</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='table-history-list'>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modal_history').modal('toggle');">Wyjd??</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                <?php
                if(!isset($_GET['subpage'])) $_GET['subpage'] = 'profile'; 
                echo "<span id='selected-subpage' style='display: none;'>" . $_GET['subpage']."</span>";?>
                <div class="row mb-5">
                    <div class="col col-12">
                        <div class="panel">
                            <div class="panel-header d-flex justify-content-around">
                                <a href="admin-servers.php" class="simple-button align-center">Lista serwer??w</a>
                                <a href="admin-users.php" class="simple-button">Lista user??w</a>
                                <a href="admin-blocked-services.php" class="simple-button">Zablokowane serwisy</a>
                                <a href="admin-codes.php" class="simple-button">Generator kod??w</a>
                                <a href="admin-gamemodes.php" class="simple-button">Tryby gry</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12">
                        <div class="panel">
                            <div class="panel-header">
                                <div class="panel-header-input">
                                    <input type="text" id="input_search" placeholder="Wyszukaj...">
                                    <buttton type="button" class="btn-search" id="button_search"></buttton>
                                </div>
                                <div class="panel-header-pagination" style="margin-right: 10px; margin-left: auto;">
                                    <a onclick="GetServers(currentPage-1)" class="pagination-arrow-left"></a>
                                    <ul id="pagination-list">
                                    </ul>
                                    <a onclick="GetServers(currentPage+1)" class="pagination-arrow-right"></a>
                                </div>
                            </div>
                            <div class="panel-content p-3 pt-5">
                                <div class="panel-content-servers row">
                                    <div class="col col-12">
                                        <div class="row second-header">
                                            <div class="col col-12">
                                                <p class="mb-0">Lista dodanych serwer??w</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <table style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>Nazwa</td>
                                                    <td>U??ytkownik</td>
                                                    <td>Ilo???? graczy</td>
                                                    <td>Ratio</td>
                                                    <td>Ostatnio online</td>
                                                    <td>Online mode</td>
                                                    <td>Wersja serwera</td>
                                                    <td colspan="4">Akcje</td>
                                                </tr>
                                            </thead>
                                            <tbody class="table-list-content">
                                            </tbody>
                                        </table>
                                    </div>
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
        <script type="text/javascript" src="js/server-service.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6Ldj08kkAAAAAOAR7XBwQsbBnsFMfQFGAwE5qusl"></script>
        <script>
            var api_url = "<?php echo $api ?>";
            var data;
            var userData;
            var size = 20;
            var currentPage = 0;
            var searchPhrase = "";
            var thisServer;
            var versions = [];
            var gamemodes = [];
            $('#nav-konto').addClass('active');
            
            //Authentication
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
                if(userData.role != "ADMIN")
                    window.location.replace("account.php");
            });

            //Search input
            $('#button_search').on('click', function() {
                searchPhrase = $('#input_search').val();
                GetServers(currentPage);
            });

            //Servers
            function GetServers(page) {
                if(page<0) page = 0;
                if(data && page >= data.total%size) page = (data.total%size);
                var apiUrl;
                currentPage = page;
                console.log(currentPage)
                apiUrl = api_url+"/api/v1/servers/?page="+currentPage+"&size="+size+"&search="+searchPhrase+"&promoted=false&sort_by=likes";

                $.ajax({
                    url: apiUrl,
                    xhrFields: {
                        withCredentials: true
                    },
                })
                .done(res => {
                    $('.table-list-content').empty();

                    data = res;
                    if(data.content.length == 0) {
                        $('.table-list-content').append($('<p style="color: white; margin-top: 10px;">Brak serwer??w z tym kryterium.</p>'));
                        console.log("empty");
                        return;
                    }
                    var str = 'Ostatnie sprawdzenie: '+data.content[0].serverPingCredentials.addedAt.substr(8,2)+'.'+data.content[0].serverPingCredentials.addedAt.substr(5,2)+'.'+data.content[0].serverPingCredentials.addedAt.substr(0,4)+'  '+data.content[0].serverPingCredentials.addedAt.substr(11,5);
                    $('#last-updated-datetime').text(str);

                    for(var i=0;i<data.content.length;i++) {
                        var currentServer = data.content[i];
                        var onlineLight = 'icon-on';
                        var serverOnlineRatio = 100.00;
                        var onlineModeIcon = 'icon-verified';
                        var lastOnline = "??";
                        if(currentServer.serverPingCredentials != null) {
                            lastOnline = currentServer.serverPingCredentials.addedAt.substr(8,2)+'.'+currentServer.serverPingCredentials.addedAt.substr(5,2)+'.'+currentServer.serverPingCredentials.addedAt.substr(0,4)+'  '+currentServer.serverPingCredentials.addedAt.substr(11,5)
                            if(!currentServer.serverPingCredentials.isOnline)
                                onlineLight = 'icon-off';
                            if(currentServer.serverPingCredentials.timesOffline > 0)
                                serverOnlineRatio = (currentServer.serverPingCredentials.timesOnline / currentServer.serverPingCredentials.timesOffline).toFixed(2);
                        }
                        if(currentServer.server.promoted) promotedClass = 'premium';

                        if(!currentServer.server.onlineModeEnabled) onlineModeIcon = 'icon-no-verified';

                        $('.table-list-content').append($('<tr class="table-list-row"><td class="body-rank">'+currentServer.server.id+'.</td><td class="body-name">'+currentServer.server.name+'</td><td class="body-web">'+currentServer.owner.login+'</td><td style="margin-left: 5px;" class="body-players"><span style="float:left;">'+(currentServer.serverPingCredentials.onlinePlayers ?? '0')+'/'+(currentServer.serverPingCredentials.serverSize ?? '0')+'</span> <i style="margin-left: auto; margin-right: 5px; margin-top:3px;" class="icon '+onlineLight+'"></i></td><td class="body-ratio">'+serverOnlineRatio+'%</td><td>'+lastOnline+'</td><td class="body-mode"><i class="icon '+onlineModeIcon+'"></i></td><td class="body-version" title="'+(ReturnServerVersions(currentServer.minecraftServerVersions).versionsString ?? '?')+'">'+(ReturnServerVersions(currentServer.minecraftServerVersions).formatedVersions ?? '?')+'</td><td><button onclick="ModalDelete(\''+currentServer.server.id+'\',\''+currentServer.server.name+'\')"><i class="bi bi-trash3-fill"></i></button></td><td><button onclick="ModalEdit(\''+currentServer.server.id+'\')"><i class="bi bi-pencil-square"></i></button></td><td><button onclick="ModalHistory(\''+currentServer.server.id+'\')"><i class="bi bi-card-text"></i></button></td><td><a href="server.php?id='+currentServer.server.id+'"><i class="bi bi-card-image"></i></a></td></tr>'));
                        
                    }
                    ChangePage(currentPage);
                });
            }

            function ChangePage(page) {
                $('#pagination-list').empty();
                var startPage = 1;
                var maxPages = (data.total%size);
                if(currentPage > 4) startPage = currentPage - 4;
                if(currentPage+4 < maxPages) maxPages = currentPage+4; 
                for(var i=startPage; i<=maxPages;i++) {
                    if(i==currentPage+1) 
                        $('#pagination-list').append($('<li><a onclick="GetServers('+(i-1)+')" class="active">'+i+'</a></li>'));
                    else
                        $('#pagination-list').append($('<li><a onclick="GetServers('+(i-1)+')">'+i+'</a></li>'));
                }
            }   


            //Wersje gry 
            function AddGameVersionsToInput(thisServer) {
                $('#server-versions-div .tokens-container').children('.token').remove();
                if(thisServer.minecraftServerVersions.length == 0) return;
                var v = thisServer.minecraftServerVersions.map(x => x.minecraftVersion.version);
                console.log(v);
                v.forEach(x => $('#server-versions-div .tokens-container').prepend($('<li class="token" data-value="'+x+'"><a class="dismiss" onclick="DeleteElement(\''+x+'\')"></a><span>'+x+'</span></li>')));

            }
            //Pobra?? dane z inputa do tablicy
            //Tablice wys??a?? do API
            function GetVersionsFromInput() {
                var htmlArray = $('#server-versions-div').children('.tokenize').children('.tokens-container').children('li.token');
                for(var i = 0; i<htmlArray.length; i++) {
                    versions[i] = htmlArray[i].innerText;
                }
            }
            //Gamemodes
            function AddGameModesToInput(thisServer) {
                if(thisServer.serverGameModes.length == 0) return;
                if($('#server-gamemodes-div .tokens-container').children().length > 1) return;
                var gm = thisServer.serverGameModes;
                gm.forEach(x => $('#server-gamemodes-div .tokens-container').prepend($('<li class="token" data-value="'+x.id+'"><a class="dismiss" onclick="DeleteElement(\''+x.id+'\')"></a><span>'+x.gameMode+'</span></li>')))
            }
            function GetGameModesFromInput() {
                var htmlArray = $('#server-gamemodes-div').children('.tokenize').children('.tokens-container').children('li.token');
                for(var i = 0; i<htmlArray.length; i++) {
                    gamemodes[i] = htmlArray[i].attributes[1].textContent;
                }
            }

            function DeleteElement(id) {
                $('li.token[data-value="'+id+'"]').remove();
            }

            $('#addserver-ping-versions').on('change', function() {
                console.log("Git");
                if($('#addserver-ping-versions').prop('checked'))
                    $('#server-versions-div').css('display','block');
                else 
                    $('#server-versions-div').css('display','none');
            })
                
            


            function ModalDelete(serverId,serverName) {
                $('#modal_delete-server-name').text(serverName);
                $('#modal_delete-server-id').text(serverId);
                $('#modal_delete').modal('toggle');
            }
            function ModalDeleteAction() {
                $('#modal_delete').modal('toggle');
                var id = $('#modal_delete-server-id').text();
                $.ajax({
                    url: api_url+'/api/v1/servers/'+id+'/',
                    type: 'DELETE',
                    xhrFields: {
                        withCredentials: true
                    },
                }).done(alert("Usuni??to serwer "+id));
            }

            function ModalEdit(serverId) {
                thisServer = data.content.find(x => x.server.id == serverId);
                
                $('#modal_edit-servername').val(thisServer.server.name);
                $('#modal_edit-ip').val(thisServer.serverHostCredentials.address);
                $('#modal_edit-port').val(thisServer.serverHostCredentials.port);
                if(thisServer.server.onlineModeEnabled) $('#modal_edit-onlinemode').prop('checked', true);
                $('#modal_edit-website').val(thisServer.server.homepage);
                $('#modal_edit-discord-server').val(thisServer.server.discord);
                $('#modal_edit-discord-owner').val(thisServer.owner.discord);
                $('#modal_edit-facebook-server').val(thisServer.server.facebook);
                $('#modal_edit-desc').val(thisServer.server.description);
                $('#modal_edit').modal('toggle');

                $('.demo1').tokenize2({sortable: true});
                AddGameVersionsToInput(thisServer);
                $('.demo2').tokenize2({sortable: true});
                AddGameModesToInput(thisServer)
                
            }
            function OnModalEditAction(e) {
                e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Ldj08kkAAAAAOAR7XBwQsbBnsFMfQFGAwE5qusl', {action: 'submit'}).then(function(token) {
                        ModalEditAction(token);
                    });
                });
            }
            function ModalEditAction(token) {
                //Send api request edit server
                var servername = $('#modal_edit-servername').val();
                var ip = $('#modal_edit-ip').val();
                var port = $('#modal_edit-port').val();
                var isOnlineMode = $('#modal_edit-onlinemode').prop('checked');
                var homepage = $('#modal_edit-website').val();
                var discordServer = $('#modal_edit-discord-server').val();
                var facebookServer = $('#modal_edit-facebook-server').val();
                var desc = $('#modal_edit-desc').val();
                GetGameModesFromInput();
                var pingVersions = $('#addserver-ping-versions').prop('checked');
                if(pingVersions) GetVersionsFromInput();

                $.ajax({
                    type: 'PUT',
                    url: api_url+'/api/v1/servers/'+thisServer.server.id+'/',
                    dataType: 'json',
                    xhrFields: {
                        withCredentials: true
                    },
                    contentType: "application/json; charset=utf-8",
                    data: '{"hostCredentials": {"host:" "'+ip+'","port": "'+port+'",},"serverCredentials": {"name": "'+servername+'","description": "'+desc+'","homepage": "'+homepage+'","facebook": "'+facebookServer+'","discord": "'+discordServer+'""isOnlineModeEnabled": '+isOnlineMode+',},"gameModeCredentials": {"internalGameModes": '+gamemodes+',}, "gResponse": "'+token+'",}',
                    success: function(data, textStatus, xhr) {
                        console.log("Success: "+xhr.status + " " +textStatus);
                    },
                    complete: function(xhr, textStatus) {
                        console.log("Complete: "+xhr.status + " " +textStatus);
                        //console.log("Complete: "+xhr.responseJSON.message);
                    } 
                });
            }

            function ModalHistory(serverId) {
                //Show modal change ip history
                $('#table-history-list').empty();
                $('#modal_history').modal('toggle');
                $.ajax({
                    url: api_url+'/api/v1/history/server/'+serverId+'/?size=10&page=0',
                    xhrFields: {
                        withCredentials: true
                    },
                }).done(res => {
                    res.content.forEach(x => {
                        var t = x.at.substr(8,2)+'.'+x.at.substr(5,2)+'.'+x.at.substr(0,4)+'  '+x.at.substr(11,5);
                        var oldIp = "?";
                        var newIp = "?";
                        var payment = "?";
                        if(x.oldHostCredentials) oldIp = x.oldHostCredentials.address;
                        if(x.newHostCredentials) newIp = x.newHostCredentials.address;
                        if(x.payment) payment = x.payment.method+' '+x.payment.price;
                        $('#table-history-list').append($('<tr><td>'+t+'</td><td>'+x.user.login+'</td><td>'+x.type+'</td><td>'+oldIp+'</td><td>'+newIp+'</td><td>'+payment+'</td></tr>'))
                    })
                })
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

            GetMinecraftAllVersions();
            GetMinecraftAllGameModes();
            GetServers(0)

        </script>
    </body>
</html>