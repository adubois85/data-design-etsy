<?php
namespace Edu\Cnm\adubois2\DataDesignEtsy;

/**
 *Creating a Class for Profile
 *
 * This class will define and store information about a user for our data design project.  This only includes basic
 * information right now, but may be extended to include more information at a later date.
 *
 * @author Alexander DuBois <adubois2@cnm.edu>
 * @version 0.1
 **/
class Profile {
	/**
	 * The ID for this profile; Primary Key
	 **/
	private $profileId;
	/**
	 * The user-friendly profile name; must be unique
	 **/
	private $profileAtHandle;
	/**
	 * The user's phone number
	 **/
	private $profilePhoneNumber;
	 /**
	 * The user's e-mail address; must be unique
	 **/
	private $profileEmail;
	 /**
	 * The Hash value of the user's password
	 **/
	private $profileHash;
	/**
	 * The Salt applied before hashing a user's password
	 **/
	private $profileSalt;

	/**
	 * Profile constructor [TODO:Fill in details of doc bloc]
	 * @param $profileId
	 * @param $profileAtHandle
	 * @param $profilePhoneNumber
	 * @param $profileEmail
	 * @param $profileHash
	 * @param $profileSalt
	 */

	public function __construct($profileId, $profileAtHandle, $profilePhoneNumber, $profileEmail, $profileHash, $profileSalt) {
		try {
			$this->setProfileId($profileId);
			$this->setProfileAtHandle($profileAtHandle);
			$this->setProfilePhoneNumber($profilePhoneNumber);
			$this->setProfileEmail($profileEmail);
			$this->setProfileHash($profileHash);
			$this->setProfileSalt($profileSalt);
		}
		catch (\RangeException | \InvalidArgumentException | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 *Accessor method to retreive profile ID
	 *
	 * @return int value of associated profileId
	 **/
	public function getProfileId() {
		return($this->profileId);
	}
	/**
	 *Mutator method to alter profile's ID
	 *
	 * @param int $newProfileId sets new value of profile ID
	 * @throws \RangeException if the parameter is an integer less than 1
	 **/
	public function setProfileId(?int $newProfileId) : void {
		//if ID is null, return it immediately
		if ($newProfileId === null) {
			$this->profileId = null;
			return;
		}
		//check if input is greater than 0
		if($newProfileId < 1) {
			throw(new \RangeException("Profile ID is not a positive integer"));
		}
		$this->profileId = $newProfileId;
	}

	/**
 	*Accessor method to retreive profile's handle
 	*
 	* @return string value of associated profileAtHandle
 	**/
	public function getProfileAtHandle() {
		return($this->profileAtHandle);
	}

	/**
	 *Mutator method to alter profile's handle
	 *
	 * @param string $newAtHandle sets new value of profile handle
	 * @throws \InvalidArgumentException if $newAtHandle contains no valid characters
	 **/
	public function setProfileAtHandle($newAtHandle) {
		//sanitize and trim the new handle
		$newAtHandle = trim($newAtHandle);
		$newAtHandle = filter_var($newAtHandle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES | FILTER_FLAG_STRIP_BACKTICK);
		if(empty($newAtHandle) === true) {
			throw(new \InvalidArgumentException("There are no valid characters in the entered handle."));
		}
		if (strlen($newAtHandle) > 32) {
			throw(new \RangeException("The entered handle is too long."));
		}
		$this->profileAtHandle = $newAtHandle;
	}
	/**
	 *Accessor method to retreive profile Phone Number
	 *
	 * @return int value of associated profilePhoneNumber
	 * @throws \InvalidArgumentException if there is no valid phone number associated with the profileId
	 **/
	public function getProfilePhoneNUmber() {
		if($this->profilePhoneNumber === NULL) {
			throw(new \InvalidArgumentException("There is no phone number associated with this account."));
		}
		return($this->profilePhoneNumber);
	}
	/**
	 *Mutator method to alter profile's phone number
	 *
	 * @param int $newPhoneNumber sets new value of Phone Number
	 * @throws \RangeException if entered value is larger than 12
	 **/
	public function setProfilePhoneNumber(?int $newPhoneNumber) : int {
	//validate the entered phone number isn't too long
		$cleanedPhoneNumber = filter_var($newPhoneNumber, FILTER_SANITIZE_NUMBER_INT);
		if (strlen($cleanedPhoneNumber) > 12 ) {
			throw (new \RangeException("The entered number is too long."));
		}
		$this->profilePhoneNumber = $cleanedPhoneNumber;

	}
	/**
	 *Accessor method to retreive profile's e-mail address
	 *
	 * @return string value of associated profileEmail
	 **/
	public function getProfileEmail() {
		return($this->profileEmail);
	}
	/**
	 *Mutator method to alter profile's e-mail address
	 *
	 * @param string $newEmailAddress sets new value of e-mail address
	 * @throws \InvalidArgumentException if the e-mail is not valid for any reason
	 **/
	public function setProfileEmail($newEmailAddress) {
		//sanitize and validate the entered e-mail
		$cleanedEmail = filter_var($newEmailAddress, FILTER_SANITIZE_EMAIL);
		if ($newEmailAddress !== $cleanedEmail && filter_var($newEmailAddress, FILTER_SANITIZE_EMAIL)) {
			throw (new \InvalidArgumentException("The e-mail entered is not valid"));
		}
		$this->profileEmail = $cleanedEmail;
	}
	/**
	 *Accessor method to retreive profile hash
	 *
	 * @return int value of associated profileHash
	 **/
	public function getProfileHash() {
		return($this->profileHash);
	}
	/**
	 *Mutator method to alter profile's hash
	 *
	 * @param string $newProfileHash sets new value of profileHash
	 * @throws \RangeException if the hash is not the correct length or type
	 **/
	public function setProfileHash(?string $newProfileHash) : string {
		//sanitize and validate the entered hash
		$cleanedHash = filter_var($newProfileHash, FILTER_SANITIZE_STRING);
		if (strlen($cleanedHash) !== 128) {
			throw (new \RangeException("The entered hash is not the correct length."));
		}
		$this->profileHash = $cleanedHash;
	}

	/**
	 *Accessor method to retreive profile salt
	 *
	 * @return int value of associated profileSalt
	 **/
	public function getProfileSalt() {
			return ($this->profileSalt);
		}
		/**
		 *Mutator method to alter profile's salt
		 *
		 * @param string $newProfileSalt sets new value of profile's salt
		 * @throws \RangeException if the salt is not the correct length or type
		 **/
	public function setProfileSalt(?string $newProfileSalt) : string {
		//sanitize and validate the entered salt
		$cleanedSalt = filter_var($newProfileSalt, FILTER_SANITIZE_STRING);
		if (strlen($cleanedSalt) !== 32) {
			throw (new \RangeException("The entered salt is not the correct length."));
		}
		$this->profileSalt = $newProfileSalt;
	}

	/**
	 * Method to insert our variables into a Database
	 *
	 *
	 */
	public function insert(\PDO $pdoInsert) {
		//might need to check if ID exists
		//prepping the command to be passed to the database
		$queryInsert = "INSERT INTO profile(profileAtHandle, profilePhoneNumber, profileEmail, profileHash, profileSalt) VALUES (:profileAtHandle, :profilePhoneNumber, :profileEmail, :profileHash, :profileSalt)";
		$preppedInsert = $pdoInsert->prepare($queryInsert);

		//We must sub out the placeholders before submitting to the database
		$parameters = ["profileAtHandle" => $this->profileAtHandle, "profilePhoneNumber" => $this->profilePhoneNumber, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash, "profileSalt" => $this->profileSalt];
		$preppedInsert->execute($parameters);

		//We don't want to add the profile ID directly with the INSERT statement, so we add it here
		$this->profileId = intval($pdoInsert->lastInsertId());
	}

	/**
	 * Method to update a profile database entity by profile ID (the primary key)
	 *
	 * @param \PDO $pdoUpdate
	 * [TODO: Complete this doc bloc]
	 */
	public function update(\PDO $pdoUpdate) {
		//first check if the profile ID exists, i.e. not null
		if ($this->profileId === null) {
			throw (new \PDOException("Unable to update profile -- that profile ID does not exist."));
		}
		//prepping the command to be passed to the database
		$queryUpdate = "UPDATE profile SET profileAtHandle = :profileAtHandle, profilePhoneNumber = :profilePhoneNumber, profileEmail = :profileEmail, profileHash = :profileHash, profileSalt = :profileSalt WHERE profileId = :profileId";
		$preppedUpdate = $pdoUpdate->prepare($queryUpdate);

		//We must sub out the placeholders before submitting to the database
		$parameters = ["profileAtHandle" => $this->profileAtHandle, "profilePhoneNumber" => $this->profilePhoneNumber, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash, "profileSalt" => $this->profileSalt];
		$preppedUpdate->execute($parameters);
	}

	public function delete(\PDO $pdoDelete) {

		//prepping the command to be passed to the database
		$queryDelete = "DELETE FROM profile WHERE profileId = :profileId";
		$preppedDelete = $pdoDelete->prepare($queryDelete);

		//We must sub out the placeholder before submitting to the database
		$parameters = [profileId => $this->profileId];
		$preppedDelete->execute($parameters);
	}
}

?>