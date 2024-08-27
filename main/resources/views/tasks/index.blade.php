<x-app-layout>
    <div class="container flex flex-col gap-10 self-center w-full justify-center">
        <form method="POST" action="{{ route('tasks.store') }}" class="creator input_task flex flex-col self-center justify-center">
            @csrf
            @method('POST')
            <div class="flex no-wrap" style="gap: 10px">
                <input 
                    type="text"
                    name="task"
                    placeholder="Add a new task"
                    class="rounded-lg w-full"
                />
                <x-primary-button class="button"><strong>></strong></x-primary-button>
            </div>
            
            <x-input-error :messages="$errors->get('task')" class="mt-2" />
        </form>
        <div class="container-tasks">
            @foreach ($tasks as $task)
                <div class="task flex justify-between">
                    <span>{{ ucfirst($task->task)}}</span>
                    <div class="controlers flex gap-10">
                        <form action="{{ route('tasks.complete', $task)}}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit">
                                @if($task->completed)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app" viewBox="0 0 16 16">
                                        <path d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4z"/>
                                    </svg>
                                @endif
                            </button>
                        </form>
                        <form action="{{ route('tasks.edit', $task)}}" method="get">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<style scoped>
    .container, .container-tasks {
        margin-top: 2rem;
    }

    .creator {
        display: flex;
        justify-content: center;
        width: 100%;
        gap: 1rem;
        max-width: 540px;
        min-width: 300px;
    }

    .container-tasks {
        display: flex;
        flex-direction: column;
        width: 100%;
        align-self: center;
        max-width: 540px;
        min-width: 300px;
    }

    .button {
        width: 40px;
    }

    .task {
        display: flex;
        gap: 1rem;
        height: 2rem;
        text-align: center;
        align-items: center;
        width: 100%;
    }

    .controlers {
        display: flex;
        gap: 1rem;
    }

    @media (max-width: 570px) {
        .creator {
            flex-direction: column;
            width: 100%;
        }

        .container-tasks {
            width: 100%;
            min-width: unset;
        }

        .task {
            flex-direction: row;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .controlers {
            gap: 0.5rem;
        }
    }
</style>
