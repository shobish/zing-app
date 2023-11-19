
<div class="col-lg-9 col-md-7">
    <div class="add-product  ">
       <button class="btn btn-success float-end mb-3"  data-bs-toggle="modal" data-bs-target="#addproduct">Add Product</button> 
    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Description</th>
        <th scope="col">Product Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
            <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
            <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
        </tr>
    </tbody>
    </table>



</div>


<!-- Modal -->
<div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    {!! Form::vertical_open()->id('addproduct')->method('post')->enctype('multipart/form-data')->addClass('modal-content')->action(guard_url('product' )) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productname" placeholder="Product Name">
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description</label>
            <input type="text" class="form-control" name="productdescription"id="productDescription" placeholder="Product Description">
        </div>
        <div class="mb-3">
            <label for="product Price" class="form-label">Product Price</label>
            <input type="text" class="form-control" name="productprice" id="product Price" placeholder="Product  Price">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    {!! Form::close() !!}

  </div>
</div>