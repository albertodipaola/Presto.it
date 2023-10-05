<form class="needs-validation" wire:submit.prevent="store" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('ui.title')}}</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title">
        @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">{{__('ui.desc')}}</label>
        <textarea class="form-control @error('description') is-invalid @enderror" wire:model="description" rows="3"></textarea>
        @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">{{__('ui.category')}}</label>
        <select class="form-select @error('category_id') is-invalid @enderror" wire:model="category_id">
            <option selected value="">{{__('ui.choose-category')}}</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{__("ui.$category->name")}}</option>
            @endforeach
        </select>
        @error('category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('ui.images')}}</label>
        <input type="file" multiple class="form-control @error('imagesTemporary.*') is-invalid @enderror" wire:model="imagesTemporary">
        @error('imagesTemporary.*') <span class="invalid-feedback">{{ $message }}</span> @enderror
        @if (!empty($images))
        <div class="row mt-3 border rounded">
            <h5>{{__('ui.images-preview')}}</h5>
            @foreach ($images as $key=>$image)
            <div class="col-12 col-md-3 my-3">
                <img src="{{$image->temporaryUrl()}}" class="img-fluid" style="height: 100px" alt="">
                <button class="btn-red" type="button" wire:click='removeImageTemporary({{$key}})'>{{__('ui.delete')}}</button>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('ui.price')}}</label>
        <input type="number" step="0.01" min="0" max="9999.99" class="form-control @error('price') is-invalid @enderror" wire:model="price">
        @error('price') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <button class="btn btn-orange" type="submit">{{__('ui.create')}}</button>
</form>