@php
/** @var \App\Models\BlogPost $item */
/** @var \Illuminate\Support\Collection @categoryList */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#additionaldata" role="tab">Дополнительные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ $item->title }}" id="title" type="text" class="form-control"
                                minheight="3" requred>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Родитель</label>
                            <select name="category_id" value="{{ $item->title }}" id="category_id" type="text"
                                class="form-control" placeholder="Выберите категорию" requred>

                                @foreach ($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}" @if ($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content_raw">Текст</label>
                            <textarea name="content_raw" value="{{ $item->content_raw }}" id="content_raw" class="form-control"
                                rows="30" requred>{{ old('content_raw', $item->content_raw) }}</textarea>
                        </div>

                        <div class="form-check">
                            <input name="is_published" 
                                type="hidden"
                                value="0">

                            <input name="is_published" 
                                type="checkbox" 
                                value="1" 
                                id="is_published" 
                                class="form-check-input"
                                @if ($item->is_published)
                                    checked="checked"
                                @endif                                
                                >
                                
                            <label for="form-check-label" for="is_published">Опубликовано</label>
                        </div>
                    </div>
                    <div class="tab-pane" id="additionaldata" role="tabpanel">
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{ $item->slug }}" id="slug" type="text" class="form-control"
                                minheight="3" requred>
                        </div>                    

                        <div class="form-group">
                            <label for="excerpt">Анонс</label>
                            <textarea name="excerpt" value="{{ $item->excerpt }}" id="excerpt" class="form-control"
                                rows="6" requred>{{ old('excerpt', $item->excerpt) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>