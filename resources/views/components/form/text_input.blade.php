<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{$label ?? ''}}</label>
    <input
        class="form-control"
        type="{{empty($type) ? 'text' : $type}}"
        id="{{$name}}"
        name="{{$name}}"
        placeholder="{{$placeholder ?? ''}}"
        {{empty($required)? '': 'required'}}
        value="{{$value ?? ''}}"/>
</div>
