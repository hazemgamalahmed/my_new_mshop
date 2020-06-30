@csrf
                   <label>category Name</label>
                   <select class="form-control" name="category_id">
                   @foreach($categories as $rowCategory)
                   @if(isset($product) && $product->category->id === $rowCategory->id)
                   <option value = "{{$rowCategory->id}}" selected>{{$rowCategory->name}}</option>
                   @endif
                   <option value="{{$rowCategory->id}}">{{$rowCategory->name}}</option>
                   @endforeach
                   </select>
                   @if($errors->first('category_id'))
                   <br>
                   <span class="text-danger">{{$errors->first('category_id')}}</span>
                   <br/>
                   @endif
                   <label>Product Name</label>
                   <input type="text" name="name" class="form-control"
                   value = "{{isset($product) ? $product->name : ''}}"
                    placeholder="Product Name" required />
                   @if($errors->first('name'))
                   <br>
                   <span class="text-danger">{{$errors->first('name')}}</span>
                   <br/>
                   @endif
                   <label>Price</label>
                   <input type="number" name="price"
                   value = "{{isset($product) ? $product->price : ''}}"
                    class="form-control" placeholder="Price" required/>
                   @if($errors->first('price'))
                   <br>
                   <span class="text-danger">{{$errors->first('price')}}</span>
                   <br/>
                   @endif
                   <label>description</label>
                   <textarea class="form-control" name="description">{{isset($product) ? $product->description : ''}}</textarea>
                  