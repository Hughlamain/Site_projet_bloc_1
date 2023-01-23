/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

// Wait for the deviceready event before using any of Cordova's device APIs.
// See https://cordova.apache.org/docs/en/latest/cordova/events/events.html#deviceready
document.addEventListener('deviceready', onDeviceReady, false);

function onDeviceReady() {
    // Cordova is now initialized. Have fun!
    // Initialisation de l'application en utilisant Cordova
    document.addEventListener('deviceready', function () {

        // Code pour créer un nouveau client
        function createClient() {
            var client = {
                firstName: document.getElementById("firstName").value,
                lastName: document.getElementById("lastName").value,
                email: document.getElementById("email").value,
                product: document.getElementById("product").value,
                price: document.getElementById("price").value,
                deadline: document.getElementById("deadline").value
            };
            // Enregistrement des informations du client dans la mémoire de l'appareil
            localStorage.setItem("client", JSON.stringify(client));

            // Code pour organiser les alarmes en fonction des dates butoirs
            setAlarm();

            // Afficher les boutons pour mettre à jour et supprimer un client
            document.getElementById("updateBtn").style.display = "block";
            document.getElementById("deleteBtn").style.display = "block";
        }
        // Code pour mettre à jour un client existant
        function updateClient() {
            var client = JSON.parse(localStorage.getItem("client"));
            client.firstName = document.getElementById("firstName").value;
            client.lastName = document.getElementById("lastName").value;
            client.email = document.getElementById("email").value;
            client.product = document.getElementById("product").value;
            client.price = document.getElementById("price").value;
            client.deadline = document.getElementById("deadline").value;

            // Enregistrement des informations mise à jour dans la mémoire de l'appareil
            localStorage.setItem("client", JSON.stringify(client));

            // Code pour organiser les alarmes en fonction des dates butoirs
            setAlarm();
        }
        // Code pour supprimer un client existant
        function deleteClient() {
            localStorage.removeItem("client");

            // Cacher les boutons pour mettre à jour et supprimer un client
            document.getElementById("updateBtn").style.display = "none";
            document.getElementById("deleteBtn").style.display = "none";
        }
        // Code pour organiser les alarmes en fonction des dates butoirs
        function setAlarm() {
            var client = JSON.parse(localStorage.getItem("client"));
            var deadline = new Date(client.deadline);
            cordova.plugins.notification.local.schedule({
                id: 1,
                title: "Deadline Approaching",
                text: "Product: " + client.product + " Price: " + client.price,
                at: deadline,
                sound: null
            });
        }
    }, false);


    console.log('Running cordova-' + cordova.platformId + '@' + cordova.version);
    document.getElementById('deviceready').classList.add('ready');
}
