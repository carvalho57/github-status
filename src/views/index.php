<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Github Status</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik+Dirt&family=Sixtyfour&display=swap');

        * {
            margin: 0;
        }

        body {
            width: 80%;
            margin: 0 auto;
            max-width: 900px;
            font-family: "Sixtyfour", sans-serif;

        }

        h1 {
            margin: 10px;
            font-size: 3rem;
        }

        h1,
        h2 {
            text-align: center;
        }

        hr {
            width: 80%;
        }

        .component {
            width: 100%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            float: left;
            box-shadow: 2px 3px 1px 0px rgba(0, 0, 0, 0.75);
        }

        .component p {
            margin: 5px 0;
        }

        #refresh-button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .refresh-button {
            cursor: pointer;
            padding: 16px 32px;
            font-size: 16px;
            transition-duration: 0.4s;
            border: 2px solid #6b6b6b;
            border-radius: 10px;
            width: 200px;
        }

        .refresh-button:hover {
            background-color: #6b6b6b;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <h1>Github Status</h1>
        <h2> A simple web scrapper</h2>
        <div id="refresh-button-container">
            <button class="refresh-button" type="button">Get Status</button>

        </div>
    </header>

    <div id="components-render">
    </div>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            updateComponentsStatus();
        });

        const refreshButton = document.querySelector('.refresh-button');
        refreshButton.addEventListener('click', function (e) {
            e.stopPropagation();
            updateComponentsStatus();
        })

        function updateComponentsStatus() {

            const componentsRender = document.querySelector('#components-render');

            //Remove all child elements
            while (componentsRender.firstChild) {
                componentsRender.removeChild(componentsRender.lastChild);
            }

            fetch('/status')
                .then(response => response.json())
                .then(components => {
                    console.log(components);
                    render(components)
                })
        }


        function render(components) {
            const componentsRender = document.querySelector('#components-render');

            components.forEach(component => {

                const div = document.createElement('div');
                div.classList.add('component');

                const name = document.createElement('p');
                const nameContent = document.createTextNode(`Name: ${component.name}`);
                name.appendChild(nameContent);

                const description = document.createElement('p');
                const descriptionContent = document.createTextNode(`Description: ${component.description}`);
                description.appendChild(descriptionContent);

                const status = document.createElement('p');
                const statusContent = document.createTextNode(`Status: ${component.status}`);
                status.appendChild(statusContent);

                div.appendChild(name);
                div.appendChild(description);
                div.appendChild(status);;

                componentsRender.appendChild(div);
            });
        }

    </script>
</body>

</html>