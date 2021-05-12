<?php
include_once '../log/Log.php';
include_once '../repository/ContactUsRepository.php';

class ContactUsService{

  private ContactUsRepository $contactRepository;

  public function __construct(){

  }

  public function insert($data,Log $logger){
    $this->contactRepository = new ContactUsRepository();
    session_start();
    try{
      $this->contactRepository->getConnection()->insert(uniqid(),$data['name'],$data['email'],$data['subject'],$data['description'],$logger);
      $_SESSION['contactMessage'] = 'The email has been send';
    } catch (\Exception $e) {
      $logger -> addErrorLog('[ContactUsRepository::insert]-> Exception '.$e->getMessage());
      $_SESSION['contactMessage'] = 'There was a problem sending the email please try again after 10 minutes';
    }
  }

  public function getContacts(Log $logger){
    $this->contactRepository = new ContactUsRepository();
    try {
      $contacts = $this->contactRepository->getConnection()->getAllContacts();
      $logger->addInfoLog('[ContactUsService::getContacts]-> Contacts fetched successfully');
      return $contacts;
    } catch (\Exception $e) {
      $logger -> addErrorLog('[ContactUsService::getContacts]-> Exception '.$e->getMessage());
    }
  }

  public function markAsRead($contactId, Log $logger){
    $this->contactRepository = new ContactUsRepository();
    try {
      $this->contactRepository->getConnection()->updateContactStatus($contactId);
      $logger->addInfoLog('[ContactUsService::markAsRead]-> Contact updated successfully');
    } catch (\Exception $e) {
      $logger -> addErrorLog('[ContactUsService::markAsRead]-> Exception '.$e->getMessage());
    }
  }
}

 ?>
