<x-layout page="B7Web Todo: Login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
        
    </x-slot:btn>

       <section id="create_task_section">
            <h1> Criar Tarefa </h1>
            <form>
                
                <x-form.text_input name="title" label="Titulo da Task" required=required placeholder="Digite o titulo da tarefa" />

                <x-form.text_input type=date name="due_date" label="Date de Realização:" required=required  />

                <x-form.select_input
                name="category"
                label=Categoria
                >
                    <option>Valor Qualquer</option>
                </x-form.select_input>
                
                <x-form.textarea_input
                name="description"
                placeholder="Digite a descrição da tarefa "
                />
                <x-form.btn_input
                type="reset"
                >Reset</x-form.btn_input>
                <div class="inputArea">
                    <button type="submit" class="btn btn-primary">Criar tarefa </button>
                </div>

            </form>
       </section>
    
</x-layout>