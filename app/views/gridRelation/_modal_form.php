<?php
$fromType = get_class($model);
$modalId = "addrelation-" . strtolower($fromType) . "-" . strtolower($toType) . "-modal";
$allItems = ($toType == '') ? true : false;
$this->beginWidget('bootstrap.widgets.TbModal', array('id' => $modalId));
?>
<?php if ($type == "edge"): ?>
    <script>
        $(document).ready(function () {
            $('.modal input[name=newitemtitle]').keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $('.modal input[name=create-new]').trigger('click');
                    return false;
                }
            });
        });
        function getMyData() {
            var vals = new Array();
            $.each($("input[name='modalGrid']:checked"), function () {
                vals.push($(this).val());
            });
            var jsondata = ({'<?php echo $fromType; ?>': {'relation': '<?php echo $relation; ?>', 'fromId': '<?php echo $model->id; ?>', 'edges_to_add': vals}});
            return jsondata;
        }
        function relationComplete() {
            location.reload();
        }
    </script>
<?php elseif ($type == 'input'): ?>
    <script>
        $(document).ready(function () {
            $('.modal input[type=checkbox]').change(function () {
                $('.modal input[type=checkbox]').attr('checked', false);
                this.checked = true;
            });
        });
        function getMyData() {
            setInput($("input[name='modalGrid']:checked").val());
        }
        function setInput(v) {
            if (typeof v == 'object') {
                //1. Append new <option>
                $("select[name='<?php echo $fromType; ?>[<?php echo $inputId; ?>]']").append("<option value='" + v.id + "' selected='selected'>" + v.title + "</option>");
            }
            else {
                // Select <option> that has the same value as the checkbox
                $("input[name='<?php echo $fromType; ?>[<?php echo $inputId; ?>]'], select[name='<?php echo $fromType; ?>[<?php echo $inputId; ?>]']").val(v);
            }
            //relationComplete();
        }
        function relationComplete() {
            $('.modal button.close').trigger('click');
        }
    </script>
<?php endif; ?>

    <div class="modal-header">
        <button type="button" class="close" data-toggle="modal" data-target="#<?php echo $modalId; ?>">×</button>
        <h3><?php echo Yii::t(
                'crud',
                '{model}',
                array('{model}' => Yii::t('crud', 'Choose ' . $toLabel . ' to add'))
            ); ?></h3>
    </div>
    <div class="modal-body">
        <?php
        if ($allItems) {
            $allRelated = new Node('search');
        } else {
            $allRelated = new $toType('search');
        }
        $dataProvider = $allRelated->search();
        $this->widget(
            'bootstrap.widgets.TbExtendedGridView',
            array(
                'id' => strtolower($toType) . 's_to_add',
                'type' => 'striped bordered',
                'dataProvider' => $dataProvider,
                'pager' => array(
                    'class' => 'TbPager',
                    'displayFirstAndLast' => true,
                ),
                'columns' => array(
                    array(
                        'name' => 'id',
                        'header' => 'Id',
                        'value' => function ($data) {
                                if (get_class($data) == "Node") {
                                    echo CHtml::checkBox("modalGrid", null, array("value" => $data->id));
                                } else {
                                    echo CHtml::checkBox("modalGrid", null, array("value" => $data->node_id));
                                }
                            }
                    ),
                    array(
                        'name' => 'itemLabel',
                        'value' => function ($data) {
                                if (get_class($data) == "Node") {
                                    echo $data->item()->itemLabel;
                                } else {
                                    echo $data->itemLabel;
                                }
                            }
                    ),
                    //TODO: Visa bara om get_class() == Node
                    array(
                        'name' => 'type',
                        'header' => 'type',
                        'value' => function ($data) {
                                if (get_class($data) == "Node") {
                                    echo get_class($data->item());
                                } else {
                                    echo get_class($data);
                                }
                            }
                    ),
                )
            )
        );
        ?>
    </div>
    <div class="modal-footer">
        <?php
        // If (allItems) (==related), visa bara "add selected", och den ska ha special-ajax
        // Else, (==vanlig en-typs-relate)
        ?>
        <?php if ($allItems): ?>
            <div class="btn-group">
                <?php
                echo CHtml::ajaxSubmitButton(
                    Yii::t('model', 'Add selected'),
                    array("addEdges", "id" => $model->id),
                    array(
                        'data' => 'js:getMyData()',
                        'type' => 'POST',
                        'success' => 'function(html){ relationComplete(); }'
                    ),
                    array(
                        'class' => 'btn btn-primary',
                        'name' => 'add-selected',
                    )
                );
                ?>
            </div>
        <?php else: ?>
            <div class="btn-group">
                <?php
                echo CHtml::ajaxSubmitButton(
                    Yii::t('model', 'Add selected'),
                    array("addEdges", "id" => $model->id),
                    array(
                        'data' => 'js:getMyData()',
                        'type' => 'POST',
                        'success' => 'function(html){ relationComplete(); }'
                    ),
                    array(
                        'class' => 'btn btn-primary',
                        'name' => 'add-selected',
                    )
                );
                ?>
            </div>
            <div class="btn-group">
                <?php
                echo CHtml::ajaxButton(
                    Yii::t("model", "Create new " . $toLabel),
                    array(
                        "/" . $toType . "/add/",
                    ),
                    array(
                        'data' => 'js:{
                                "newitemtitle":$("input[name=newitemtitle]").val(),
                                "relation":"' . $relation . '",
                                "from_node_id":"' . $model->node_id . '",
                                "addEdge":"true",
                            }',
                        'type' => 'POST',
                        'success' => 'function(html){ relationComplete(); }'
                    ),
                    array(
                        'class' => 'btn btn-primary',
                        'name' => 'create-new',
                    )
                );
                ?>
                <input type="text" name="newitemtitle" class="span6" placeholder="<?php echo Yii::t(
                    "model",
                    "Optional title"
                ); ?>">
            </div>
        <?php endif; ?>
        <div class="btn-group">
            <a href="#" class="btn" data-toggle="modal" data-target="#<?php echo $modalId; ?>"><?php print Yii::t(
                    'app',
                    'Close'
                );
                ?></a>
        </div>
    </div>

<?php
$this->endWidget();
?>