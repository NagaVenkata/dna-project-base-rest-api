<div class="control-group ">
    <label class="control-label" for="">Videos</label>

    <div class="controls">
        <ul>
            <li>Video1</li>
        </ul>
        <?php
        echo CHtml::Button(Yii::t('model', 'Create new video'), array(
                //'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('chapter/admin'),
                'class' => 'btn'
            )
        );
        ?>
    </div>
</div>

<div class="form-actions">
    <?php
    echo CHtml::Button(Yii::t('model', 'Cancel'), array(
            'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('chapter/admin'),
            'class' => 'btn'
        )
    );
    echo ' ';
    echo CHtml::submitButton(Yii::t('model', 'Save'), array(
            'class' => 'btn btn-primary'
        )
    );
    ?>
</div>

<div class="alert alert-info">
    Hint: Lorem ipsum
</div>