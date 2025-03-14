"use strict"; 

var baseURL = "https://api.sr.se/api/v2/";
var music;
var ny = new Audio(music); 

document.addEventListener("DOMContentLoaded", function () {
    let url = baseURL + "channels?size=100&format=json"; 
    fetch(url) 
        .then(response => response.text())
        .then(data => {
            var jsonData = JSON.parse(data);

            for (var i = 0; i < jsonData.channels.length; i++) { 
                var images = '<img src="' + jsonData.channels[i].image + '" width = 40 >';
                document.getElementById("mainnavlist").innerHTML += "<li id='" + jsonData.channels[i].id + "'>" + images + " " + jsonData.channels[i].name + "</li>";
                document.getElementById("searchProgram").innerHTML += "<option value='" + jsonData.channels[i].id + "'>" + jsonData.channels[i].name + "</option>"; //kanaler namn i "searcProgram"
            }
        })
        .catch(error => {
            alert('There was an error ' + error);
        });


    document.getElementById('searchbutton').addEventListener("click", function (e) {

        var channelid = document.getElementById("searchProgram").value
        let url = baseURL + "scheduledepisodes?channelid=" + channelid + "&format=json"; 

        fetch(url, { method: 'GET' })
            .then(response => response.text())
            .then(data => {
                var jsonData = JSON.parse(data);
                for (var i = 0; i < jsonData.schedule.length; i++) {   
                    var titles = jsonData.schedule[i].title; 
                    var descriptions = jsonData.schedule[i].description; 
                    let time = eval(("new" + jsonData.schedule[i].starttimeutc).replace(/\//g, " "));
                    document.getElementById("info").innerHTML += "<h2>" + titles + "</h2>"
                    +"<b>" + descriptions + "</b>" 
                    +"<p>" + time + '<hr/>' + "</p>";  

                }
            })
            .catch(error => {
                alert('There is a problem ' + error);
            });
        document.getElementById("info").innerHTML = "";

    })

    document.getElementById('mainnavlist').addEventListener("click", function (e) {

        var channelid = e.target.id;
        let url2 = baseURL + "channels?size=100&format=json";
        let url3 = baseURL + "playlists/rightnow?channelid=" + channelid + "&format=json";

        fetch(url3, { method: 'GET' })
            .then(response => response.text())
            .then(data => {
                var jsonData = JSON.parse(data);
                if ("previoussong" in jsonData.playlist) {
                    var previoussongs = "Previous song: " + jsonData.playlist.previoussong.description;

                }
                else {
                    var previoussongs = "";
                }

                if ("nextsong" in jsonData.playlist) {
                    var nextsong = "Next song: " + jsonData.playlist.nextsong.description;  

                }
                else if ("song" in jsonData.playlist)
                    var nextsong = "Next song: " + jsonData.playlist.song.description; 

                else {
                    var nextsong = ""
                }

                fetch(url2, { method: 'GET' })
                    .then(response => response.text())
                    .then(data => {
                        var jsonData = JSON.parse(data);
                        for (var i = 0; i < jsonData.channels.length; i++) {
                            var taglines = jsonData.channels[i].tagline;
                            var name = jsonData.channels[i].name;
                            if (jsonData.channels[i].id == channelid) {

                                music = jsonData.channels[i].liveaudio.url; 
                                ny.src = music;
                                if (ny.paused) { 
                                    ny.play();

                                }
                                
                                else 
                                    ny.currentTime = 0;  

                                document.getElementById("info").innerHTML = 
                                "<h2>" + name + "</h2>" 
                                + "<h3>" + taglines + "</h3>" + '<hr/>' 
                                + "<p>" + previoussongs + "</p>" 
                                + "<p>" + nextsong + "</p>";

                            }
                        }
                    })

                    .catch(error => {
                        alert('There is a problem ' + error);
                    });
                
                document.getElementById("info").innerHTML = "";
            })
            .catch(error => {
                alert('There is a problem ' + error);
            });
    })

})