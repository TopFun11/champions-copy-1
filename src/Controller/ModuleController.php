<?php
namespace App\Controller;

use App\Controller\AppController;
// In a controller or table method.
use Cake\ORM\TableRegistry;

/**
 * Module Controller
 *
 * @property \App\Model\Table\ModuleTable $Module
 */
class ModuleController extends AppController
{
    public function initialize() {
      parent::initialize();
      $this->loadModel("Sections");
      $this->loadModel("Recordset");
      $this->loadModel("Screener");
      $this->loadModel("Enrollment");
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $module = $this->paginate($this->Module);

        $this->set(compact('module'));
        $this->set('_serialize', ['module']);
    }

    /**
    * View method
    *
    * @param string|null $id Module id.
    * @return \cake\Network\Response\null
    * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found.
    */
    public function view($id = null){
      $module = $this->Module->get($id, [
        'contain' => ['Sections', 'Users']
      ]);

      $this->set('module', $module);
      $this->set('_serialize', ['module']);
    }

    /**
     * AdminView method
     *
     * @param string|null $id Module id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function adminview($id = null)
    {
        $module = $this->Module->get($id, [
            'contain' => ['Sections']
        ]);

        $this->set('module', $module);
        $this->set('_serialize', ['module']);
    }

    public function enroll($id = null){
      $userId = $this->Auth->user('id');
      $module = $this->Module->get($id, ['contain' => ['Screener']]);
      if(!$module){
        throw new NotFoundException(__("Module not found."));
      }
      $recordset = $this->Recordset->find('all')->where(["user_id" => $userId, "screener_id" => $module->screener->id])->first();
      if(!$recordset){
        return $this->redirect(["controller" => 'recordset', 'action' => 'screener/'.$module->screener->id]);
      }

      $enrollment = TableRegistry::get("userenrollment");
      $enrolled = $enrollment->find("all")->where(['user_id' => $userId, 'module_id'=>$module->id])->first();
      if(!$enrolled){
        $enroll = $enrollment->newEntity();
        $enroll->module_id = $module->id;
        $enroll->user_id = $userId;
        if($enrollment->save($enroll)){
          die("You win!");
        }
      }else{
        die("Already enrolled");
      }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $module = $this->Module->newEntity();
        if ($this->request->is('post')) {
            $module = $this->Module->patchEntity($module, $this->request->data);
            $result = $this->Module->save($module);
            if ($result) {
                $this->Flash->success(__('The module has been saved.'));

                return $this->redirect(["controller" => "Module",'action'=>'edit/'.$result->id]);
            } else {
                $this->Flash->error(__('The module could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('module'));
        $this->set('_serialize', ['module']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Module id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      //#Done:10 Ensure Screeners are being loaded as data within this controller
      $module = $this->Module->get($id, [
          'contain' => ["Screener" => ['Question' => ['QuestionOption']]] 
      ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $module = $this->Module->patchEntity($module, $this->request->data);
            //die(var_dump($module));
            $result = $this->Module->save($module);
            if ($result) {
                $this->Flash->success(__('The module has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The module could not be saved. Please, try again.'));
            }
        }
        $sections = $this->Sections->find('all')->where(["module_id"=>$module->id,"section_id IS" =>NULL]);
        foreach($sections as $section) {
          $temp = $this->Sections->find("all")->where(["section_id"=>$section->id]);
          $section->sections=$temp;
        }
        $module->sections=$sections;
        $this->set(compact('module'));
        $this->set('_serialize', ['module']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Module id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $module = $this->Module->get($id);
        if ($this->Module->delete($module)) {
            $this->Flash->success(__('The module has been deleted.'));
        } else {
            $this->Flash->error(__('The module could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
