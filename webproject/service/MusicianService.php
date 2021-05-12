<?php
include_once '../entity/Musician.php';
include_once '../builder/MusicianBuilder.php';
include_once '../entity/User.php';
include_once '../builder/UserBuilder.php';
include_once '../validator/MusicianValidator.php';
include_once '../validator/UserValidator.php';
include_once '../enumeration/Role.php';
include_once '../repository/UserRepository.php';
include_once '../repository/MusicianRepository.php';
include_once '../enumeration/UserType.php';
include_once '../util/ValidationUtil.php';

class MusicianService{

  private UserRepository $userRepo;
  private UserValidator $userValidator;
  private MusicianRepository $musicianRepo;
  private MusicianValidator $musicianValidator;

  public function __construct(){

  }

  public function insertMusicianUser($data,Log $logger){
    try{
      $errors = $this->initializeUserAndMusicianValidators($data,$logger);
      $logger->addInfoLog(empty($errors));
      if(!empty($errors)){
        exit;
      }
      $user = User\UserBuilder::builder()->username($data['username'])
                                ->password($data['password'])->role(Role::USER)->build();
      $musician = Musician\MusicianBuilder::builder()->firstName($data['firstname'])
                    ->lastName($data['lastname'])->email($data['email'])
                    ->state($data['state'])->city($data['city'])
                    ->instrument($data['instrument'])->build();

      $errors = $this->validateUserAndMusician($user,$musician,$logger);
      if(!empty($errors)){
        $logger->addInfoLog("Validation Error");
        return;
      }
      $this->userRepo = new UserRepository();
      $this->musicianRepo = new MusicianRepository();
      $userid = uniqid();
      $this->userRepo->getConnection()->insertUser($userid,$user->getUsername(),$user->getPassword(),$user->getRole(),UserType::MUSICIAN,$logger);
      $this->musicianRepo->getConnection()->insertUser(uniqid(),$musician->getFirstName(),$musician->getLastName(),
                          $musician->getEmail(),$musician->getState(),$musician->getCity(),$musician->getInstrument(),$userid,$logger);
      $logger->addInfoLog("Singup Finished successfully.");
    }catch(\Exception $e){
      $logger->addErrorLog("[MusicianService::insertMusicianUser]->Exception".$e->getMessage());
      header('Location: ../view/signup.php');
    }
  }

  public function updateDescription($musicianId,$description,Log $logger){
    try {
      $this->musicianRepo = new MusicianRepository();
      $this->musicianRepo->getConnection()->updateDescription($musicianId,$description);
      $logger->addErrorLog("[MusicianService::updateDescription]-> Description updated successfully");
      $_SESSION['description'] = $description;
    } catch (\Exception $e) {
      $logger->addErrorLog("[MusicianService::updateDescription]->Exception".$e->getMessage());
      header('Location: ../view/index.php');
    }

  }

  private function validateUserAndMusician($user,$musician,$logger){
    $userErrors = $this->userValidator->validate($user);
    $musicianErrors = $this->musicianValidator->validate($musician,$logger);
    $errors = ValidationUtil::checkErrors($userErrors,$musicianErrors,$logger,UserType::MUSICIAN);
    return $errors;
  }

  private function initializeUserAndMusicianValidators($data,Log $logger){
      $userErrors = $this->initializeUserValidator($data);
      $musicianErrors = $this->initializeMusicianValidator($data);
      $errors = ValidationUtil::checkErrors($userErrors,$musicianErrors,$logger,UserType::MUSICIAN);
      return $errors;
  }

  private function initializeMusicianValidator($data){
       $this->musicianValidator = new MusicianValidator($data);
       return $this->musicianValidator->getErrors();
  }

  private function initializeUserValidator($data){
    $this->userValidator = new UserValidator($data);
    return $this->userValidator->getErrors();
  }
}
?>
