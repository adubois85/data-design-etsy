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

CREATE TABLE listing (
	listingId INT 	UNSIGNED AUTO_INCREMENT NOT NULL,
	listingProfileId INT UNSIGNED NOT NULL,
	listingContent VARCHAR(5000) NOT NULL,
	listingDate DATETIME(6) NOT NULL,
	listingNumberOfItems INT UNSIGNED NOT NULL,
	UNIQUE(listingId),
	FOREIGN KEY(listingProfileId) REFERENCES profile(profileId),
	PRIMARY KEY (listingId)
);

CREATE TABLE photos (
	photoListingId INT UNSIGNED NOT NULL,
	photoProfileId INT UNSIGNED NOT NULL,
	photoDate DATETIME(6) NOT NULL,
	FOREIGN KEY(photoListingId) REFERENCES listing(listingId),
	FOREIGN KEY(photoProfileId) REFERENCES profile(profileId),
	PRIMARY KEY (photoListingId, photoProfileId)
);

CREATE TABLE bought (
	boughtBuyerId INT UNSIGNED NOT NULL,
	boughtListingId INT UNSIGNED NOT NULL,
	boughtSellerId INT UNSIGNED NOT NULL,
	boughtDate DATETIME(6) NOT NULL,
	FOREIGN KEY(boughtListingId) REFERENCES listing(listingId),
	FOREIGN KEY(boughtBuyerId) REFERENCES profile(profileId),
	FOREIGN KEY(boughtSellerId) REFERENCES profile(profileId),
	PRIMARY KEY(boughtBuyerId, boughtListingId, boughtSellerId)
);