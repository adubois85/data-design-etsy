CREATE TABLE profile (
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileAtHandle VARCHAR(32) NOT NULL,
	profilePhoneNumber VARCHAR(12),
	profileEmail VARCHAR(64) NOT NULL,
	profileHash CHAR(128),
	profileSalt CHAR(32),
	UNIQUE(profileAtHandle),
	UNIQUE(profileEmail),
	PRIMARY KEY(profileId)
);

CREAT TABLE listing (
	listingId INT 	UNSIGNED AUTO_INCREMENT NOT NULL,
	listingProfileId INT UNSIGNED NOT NULL,
	listingContent VARCHAR NOT NULL,
	listingDate DATETIME(6) NOT NULL,
	listingNumberOfItems INT UNSIGNED NOT NULL,
	FOREIGN KEY listingProfileId REFERENCES profile(profileId),
	PRIMARY KEY listingId
)

