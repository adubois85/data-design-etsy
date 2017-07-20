SELECT listingId, listingProfileId, listingContent
FROM listing
WHERE listingNumberOfItems = 1;

INSERT INTO listing(profileId, profileAtHandle, profileEmail)
VALUES(DEFAULT, "adoobie", "adubois85@gmail.com");

UPDATE profile SET profileEmail = "adubois@alumni.uci.edu"
WHERE profileEmail LIKE "adubois%";

DELETE FROM listing WHERE listingDate > NOW();

UPDATE profile SET profileAtHandle = "adubois85"
WHERE profileAtHandle = "adoobie";

SELECT listingId, listingProfileId, listingContent
FROM listing
WHERE listingContent LIKE "%cool stuff%";

DELETE FROM profile WHERE profileEmail LIKE "%yahoo.com";

SELECT listingContent
FROM listing
WHERE LENGTH(listingContent) <100;

DELETE FROM listing WHERE SUM(boughtDate - listingDate) < 100000;

SELECT listingId, listingProfileId, listingContent
FROM listing
WHERE listingContent LIKE "%cool stuff%" AND listingNumberOfItems > 0;

UPDATE listing SET listingNumberOfItems = "10"
WHERE listingContext LIKE %good things% OR profileEmail LIKE "%gmail.com";