<?php
namespace php\classes;

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
	 * @throws an exception if the parameter is not an integer
	 * @throws an exception if the parameter is an integer < 1
	 **/
	public function setProfileId(int $newProfileId) : void {
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
	 * @throws exception if $newAtHandle contains no valid characters
	 **/
	public function setAtHandle($newAtHandle) {
		//sanitize and trim the new handle
		$newAtHandle = trim($newAtHandle);
		$newAtHandle = filter_var($newAtHandle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES,
		FILTER_FLAG_STRIP_BACKTICK);
		if(empty($newAtHandle) === true) {
			throw(new \InvalidArgumentException("There are no valid characters in the entered handle."));
		}
		if (strlen($newAtHandle) > 32) {
			throw(new \RangeException("The entered handle is too long."));
		}
		$this->profileAtHandle = $newAtHandle;====================
	}
	/**
	 *Accessor method to retreive profile Phone Number
	 *
	 * @return int value of associated profilePhoneNumber
	 * @throws an exception if there is no valid phone number associated with the profileId
	 **/
	public function getProfilePhoneNUmber() {
		if($this->profilePhoneNumber === NULL) {
			throw(new \Exception("There is no phone number associated with this account."));
		}
		return($this->profilePhoneNumber);
	}
	/**
	 *Mutator method to alter profile's phone number
	 *
	 * @param string $newEmailAddress sets new value of e-mail address
	 * @throws an exception if the
	 **/
	public function setProfilePhoneNumber($newPhoneNumber) {
	//sanitize and validate the entered phone number
		[TODO:code for mutating phone number]
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
	 * @throws an exception if the e-mail is not valid for any reason
	 **/
	public function setProfileEmail($newEmailAddress) {
		//sanitize and validate the entered e-mail
		$cleanedEmail = filter_var($newEmailAddress, FILTER_SANITIZE_EMAIL);
		if ($newEmailAddress !=== $cleanedEmail && filter_var($newEmailAddress, FILTER_SANITIZE_EMAIL)) {
			throw (new \Exception("The e-mail entered is not valid");
		}
		return ($cleanedEmail);
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
	 * @throws an exception if the hash is not the correct length or type
	 **/
	public function setProfileHash($newProfileHash) {
		//sanitize and validate the entered hash
		[TODO:code for mutating hash]

	/**
	 *Accessor method to retreive profile salt
	 *
	 * @return int value of associated profileSalt
	 **/
	public function getProfileSalt() {
		return($this->profileSalt);
	}
		/**
		 *Mutator method to alter profile's salt
		 *
		 * @param string $newProfileSalt sets new value of profile's salt
		 * @throws an exception if the salt is not the correct length or type
		 **/
	public function setProfileSalt($newProfileSalt) {
			//sanitize and validate the entered salt
			[TODO:code for mutating salt]
};

?>