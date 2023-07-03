<?php

/**
 * This function take directory path as a input (String)
 * and return latest updated filename and datetime in an array
 */
if (!function_exists('getLastUpdatedFileInfo')) {
	function getLastUpdatedFileInfo($directoryPath) {
		// Get the absolute path of the directory
		$absolutePath = realpath($directoryPath);

		// Initialize variables to store the last updated file information
		$lastUpdatedFile = '';
		$lastUpdatedTime = 0;

		// Check if the directory exists
		if (is_dir($absolutePath)) {
			// Open the directory
			$directoryHandle = opendir($absolutePath);

			// Loop through each file and directory in the directory
			while (false !== ($entry = readdir($directoryHandle))) {
				// Exclude current directory and parent directory entries
				if ($entry != '.' && $entry != '..') {
					// Create the full path to the entry
					$entryPath = $absolutePath . DIRECTORY_SEPARATOR . $entry;

					// Check if the entry is a directory
					if (is_dir($entryPath)) {
						// Recursively call the function to get the last updated file in the subdirectory
						$subdirectoryLastUpdated = getLastUpdatedFileInfo($entryPath);

						// Compare the last updated file in the subdirectory with the current last updated file
						if ($subdirectoryLastUpdated['last_updated'] > $lastUpdatedTime) {
							$lastUpdatedFile = $subdirectoryLastUpdated['filename'];
							$lastUpdatedTime = $subdirectoryLastUpdated['last_updated'];
						}
					} else {
						// Get the last modified time of the file
						$modifiedTime = filemtime($entryPath);

						// Update the last updated file information if necessary
						if ($modifiedTime > $lastUpdatedTime) {
							$lastUpdatedFile = $entry;
							$lastUpdatedTime = $modifiedTime;
						}
					}
				}
			}

			// Close the directory handle
			closedir($directoryHandle);
		}

		// Return the last updated file information as an array
		return array(
			'filename' => $lastUpdatedFile,
			'last_updated' => $lastUpdatedTime
		);
	}
}
