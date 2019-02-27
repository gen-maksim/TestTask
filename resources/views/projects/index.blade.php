@extends('layouts.app')


@section('content')

    <div class="h1">
        Projects by {{ auth()->user()->name }}
    </div>


    <div id="main" class=" ">
        <div class="d-flex flex-row justify-content-between p-2">

            <form action="{{ route('projects.create') }}">
                <input class="btn btn-primary" type="submit" value="New Project" />
            </form>

            <button class="btn btn-success" v-on:click="refresh">Refresh</button>

        </div>

        <div class="card-columns">

            <div class="card" v-for="project in projects">

                <div class="card-body">
                    <h4 class="card-title">@{{ project.title }}</h4>
                    <p class="card-text">@{{ project.description.slice(0,300) + '...' }}</p>
                </div>

                <div class="card-footer">
                    <small class="text-muted">
                        <a v-bind:href="'{{ route('projects.show', '') }}'+ '/' + project.id">
                            View
                        </a>
                    </small>
                </div>

            </div>

        </div>

    </div>



    <script>
        let projects = new Vue({
            el: '#main',

            data: {
                projects: JSON.parse(`{!! $projects !!}`)

            },

            methods: {
                refresh: function() {
                    axios.get("{{ route('projects.refresh') }}").then(response => this.projects = response.data.projects);
                }
            }
        });

        Pusher.logToConsole = true;

        var pusher = new Pusher('13460ea482ed2f33ee58', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('Project.created');
        channel.bind('App\\Events\\ProjectCreated', function(data) {
            projects.projects.push(data["project"]);
            alert(JSON.stringify(data));
        });
        // });
    </script>

@endsection