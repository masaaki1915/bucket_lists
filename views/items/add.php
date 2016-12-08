<div class="modal-dialog modal-lg">  
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>item_name</h4>
                  </div>
                  <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    
                                        <div class="form-group">
                                            <label for="exampleInput3">説明</label>
                                            <input type="text" class="form-control" id="exampleInput2" placeholder="数値を入力してください">
                                        </div>

                                        <div class="dropdown">
                                        <label>リスト選択</label>
                                              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                list
                                                <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="#">hogehoge</a></li>
                                                <li><a href="#">hogehoge</a></li>
                                                <li><a href="#">hogehoge</a></li>
                                                <li role="separator" class="divider"></li>
                                              </ul>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInput1">期限</label>
                                            <input type="date" class="form-control" id="exampleInput1" placeholder="数値を入力してください">
                                        </div>

                                        <label>わくわく度</label>
                                        <div class="starRating" class="form-control" id="exampleInput2">
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-pink" id="modal-save" data-dismiss="modal">add</button>
                        </div>
              </div>
         </div>

    <script src="/bucket_lists/webroot/assets/js/jquery.raty.js"></script>


    <script>
    /*ワクワク度表示*/
    $.fn.raty.defaults.path = "image";
    $('.starRating').raty({
      // hints: [0,1,2,3,4,5]
      // click: function($score, $evt) {
      //          $.post('result.php',{score:$score, url:$evt.currentTarget.baseURI},
      //                 function(data){
      //                   location.href = 'result.php';
      //                 }
      //                );
      // }
    });
    </script>
