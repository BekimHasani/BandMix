<?php
include_once '../entity/Band.php';
include_once '../builder/BandBuilder.php';
include_once '../entity/User.php';
include_once '../builder/UserBuilder.php';
include_once '../validator/BandValidator.php';
include_once '../validator/UserValidator.php';
include_once '../enumeration/Role.php';
include_once '../repository/UserRepository.php';
include_once '../repository/BandRepository.php';
include_once '../enumeration/UserType.php';
include_once '../util/ValidationUtil.php';
class BandService{

  private Band $band;
  private UserValidator $userValidator;
  private BandValidator $bandValidator;


  public function __construct(){

  }

  public function insertBandUser($data,Log $logger){
    try{
      $errors = $this->initializeUserAndBandValidators($data,$logger);
      if(!empty($errors)){
        exit;
      }
      $user = User\UserBuilder::builder()->username($data['username'])
                                ->password($data['password'])->role(Role::USER)->build();
      $band = Band\BandBuilder::builder()->bandName($data['bandName'])
                    ->description($data['description'])->bandType($data['bandType'])
                    ->email($data['email'])->state($data['state'])->city($data['city'])
                    ->build();
      $errors = $this->validateUserAndBand($user, $band, $logger);
      if(!empty($errors)){
        exit;
      }
      $userRepo = new UserRepository();
      $bandRepo = new BandRepository();
      $userId = uniqid();
      $userRepo->getConnection()->insertUser($userId,$user->getUsername(),$user->getPassword(),$user->getRole(),UserType::BAND,$logger);
      $bandRepo->getConnection()->insertUser(uniqid(), $band->getBandName(), $band->getDescription(), $band->getBandType(),
                                                    $band->getEmail(), $band->getState(), $band->getCity(), $userId, $logger);
      $logger->addInfoLog("Singup Finished successfully.");
      }catch(\Exception $e){
        $logger->addErrorLog("Excpetion on BandService::insertBandUser ".$e->getMessage());
        header('Location: ../view/signup.php');
      }
    }

    public function updateDescription($bandId,$description,Log $logger){
      try {
        $this->bandRepo = new BandRepository();
        $this->bandRepo->getConnection()->updateDescription($bandId,$description);
        $logger->addErrorLog("[BandService::updateDescription]-> Description updated successfully");
        $_SESSION['description'] = $description;
      } catch (\Exception $e) {
        $logger->addErrorLog("[BandService::updateDescription]->Exception".$e->getMessage());
        header('Location: ../view/index.php');
      }

    }

    private function validateUserAndBand($user, $band,$logger){
      $userErrors = $this->userValidator->validate($user);
      $bandErrors = $this->bandValidator->validate($band);
      foreach ($bandErrors as $key => $value) {
        $logger->addInfoLog("[$key => $value]");
      }
      $errors = ValidationUtil::checkErrors($userErrors,$bandErrors,$logger,UserType::BAND);
      return $errors;
    }

    private function initializeUserAndBandValidators($data,Log $logger){
      $userErrors = $this->initializeUserValidator($data);
      $bandErrors = $this->initializeBandValidator($data);
      $errors = ValidationUtil::checkErrors($userErrors,$bandErrors,$logger,UserType::BAND);
      return $errors;
    }

      private function initializeBandValidator($data){
        $this->bandValidator = new BandValidator($data);
        return $this->bandValidator->getErrors();
      }

      private function initializeUserValidator($data){
        $this->userValidator = new UserValidator($data);
        return $this->userValidator->getErrors();
      }
  }
?>
