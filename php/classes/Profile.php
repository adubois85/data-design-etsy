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
	private profileId;
	/**
	 * The user-friendly profile name; must be unique
	 **/
	private profileAtHandle;
	/**
	 * The user's phone number
	 **/
	private profilePhoneNumber;
	/**
	 * The user's e-mail address; must be unique
	 **/
	private profileEmail;
	/**
	 * The Hash value of the user's password
	 **/
	private profileHash;
	/**
	 * The Salt applied before hashing a user's password
	 **/
	private profileSalt;
	/**
	 *Accessor method to retreive profile ID
	 *
	 * @return int value of associated profileId
	 **/
	public getProfileId() {
		return($this->profileId);
	}
	/**
 	*Accessor method to retreive profile's handle
 	*
 	* @return string value of associated profileAtHandle
 	**/
	public getProfileAtHandle() {
		return($this->profileAtHandle);
	}
	/**
	 *Accessor method to retreive profile Phone Number
	 *
	 * @return int value of associated profilePhoneNumber
	 * @throws an exception if there is no valid phone number associated with the profileId
	 **/
	public getProfilePhoneNUmber() {
		if($this->profilePhoneNumber === NULL) {
			throw(new \Exception("There is no phone number associated with this account."));
		}
		return($this->profilePhoneNumber);
	}
	/**
	 *Accessor method to retreive profile's e-mail address
	 *
	 * @return string value of associated profileEmail
	 **/
	public getProfileEmail() {
		return($this->profileEmail);
	}
	/**
	 *Mutator method to alter profile's e-mail address
	 *
	 * @param string $newEmailAddress sets new value of e-mail address
	 *
	 **/
	public setProfileEmail($newEmailAddress) {
		//sanitize and validate the entered e-mail
		$cleanedEmail = filter_var($newEmailAddress, FILTER_SANITIZE_EMAIL);
		if ($newEmailAddress !=== $cleanedEmail && filter_var($newEmailAddress, FILTER_SANITIZE_EMAIL)) {
			throw (new \Exception("The e-mail entered is not valid");
		}
		return ($cleanedEmail);
	}

};

?>