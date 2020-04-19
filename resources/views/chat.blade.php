<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chat</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            .list-group{
                overflow-y: scroll;
                height: 200px;
            }

            .number-users{
                margin-left: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row" id="app">
                <div class="offset-4 col-4 offset-sm-1 col-sm-10">
                    <li class="list-group-item active">Chat Room
                        <span class="badge badge-danger number-users">@{{ numberOfUsers }}</span>
                    </li>
                    <div class="badge badge-pill badge-primary">@{{ typing }}</div>
                    <ul class="list-group" v-chat-scroll>
                        <message
                            v-for="value, index in chat.message"
                            :key=value.index
                            :color = chat.color[index]
                            :user = chat.user[index]
                            :time = chat.time[index] >
                            @{{ value }}
                        </message>
                    </ul>
                    <input type="text"
                           class="list-group-item form-control"
                           v-model="message" @keyup.enter="send" placeholder="Type your message here...">
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
