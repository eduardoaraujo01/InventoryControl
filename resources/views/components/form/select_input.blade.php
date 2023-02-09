<div class="mb-3">
    <label for="{{$name}}" class="form-label">
       {{$label ?? ''}}
    </label>
    <select class="form-select" id="{{$name}}"
            name="{{$name}}" {{empty($required)? '': 'required'}}>
        <option selected disabled value=""> Selecione uma opção</option>
        {{$slot}}
    </select>
</div>
