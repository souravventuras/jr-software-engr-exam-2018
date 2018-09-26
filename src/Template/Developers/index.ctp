
<div class="developers index large-12 medium-12 columns content">
    <h3><?= __('Developers') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <?php
        echo $this->Form->control('programming_languages');
        echo $this->Form->control('languages');
        ?>
        <button class="btn btn-sm yellow filter-submit margin-bottom" type="submit" name="search" value="submit"> Search</button>&nbsp;
        <button class="btn btn-sm yellow filter-submit margin-bottom" type="submit" name="reset" value="reset"> Reset</button>&nbsp;
    </fieldset>


    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('programming_languages') ?></th>
                <th scope="col"><?= $this->Paginator->sort('languages') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($developers as $developer):
                //pr($developer['programming_languages']);exit;
                $language_count = count($developer['languages']);
                $prog_lang_count = count($developer['programming_languages']);
                ?>
            <tr>
                <td><?= h($developer['email']) ?></td>
                <td><?php
                    $i =0;
                    foreach ($developer['programming_languages'] as $language){
                        if($i == ($prog_lang_count-1)){
                            echo $language;
                        }else {
                            echo $language.', ';
                        }
                        $i++;
                    }
                 ?>
                </td>
                <td><?php
                    $i =0;
                    foreach ($developer['languages'] as $lang):
                        if($i == ($language_count-1)){
                            echo $lang;
                        }else {
                            echo $lang.', ';
                        }
                        $i++;
                    endforeach;
                    ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
