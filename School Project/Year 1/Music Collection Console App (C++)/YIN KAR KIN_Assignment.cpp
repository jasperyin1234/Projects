 // Preprocessor directives
#define _CRT_SECURE_NO_WARNINGS
#include <cstdlib>
#include <cctype>
#include <cstring>
#include <cmath>
#include <ctime>
#include <iostream>
#include <iomanip>
#include <fstream>
using namespace std;

// Define global constant for the size of arrays
#define ARRAY_SIZE 50

// Structure definition
typedef struct
{
	int day;
	int month;
	int year;
} DATE;

typedef struct
{
	char song_title[ARRAY_SIZE];
	char album[ARRAY_SIZE];
	char artist[ARRAY_SIZE];
	char composer[ARRAY_SIZE];
	char genre[ARRAY_SIZE];
	DATE release_date;
	char directory_path[100];
} MUSIC;

// Function prototype to read data 
int readSong(MUSIC music[]);

// Function prototype to add songs
void addSong(MUSIC music[], int* num_songPtr);

// Function prototype to delete songs
void deleteSong(MUSIC music[], int* num_songPtr);

// Function prototype to search for a song to update/edit
void updateSearch(MUSIC music[], int num_song);
void updateEdit(MUSIC music[], int match, int indexNo[]);

// Function prototype to list songs
void listSong(MUSIC music[], int num_song);

// Function prototype to advances search
void advancedSearch(MUSIC music[], int num_song);

// Function prototype to create a random playlist
void createPlaylist(MUSIC music[], int num_song);

// Function prototype to exit 
void exitFunction(MUSIC music[], int num_song);

// Main function
int main(void)
{
	// Declare array of structures to store maximum of 120 songs
	MUSIC music[120] = {};

	// Read data from text file into array and get total number of songs in collection
	int num_song = readSong(music);

	// Declare choice for user to input to choose action from main menu (1-7)
	int choice = 0;

	// Display Menu
	do
	{
		cout << endl;
		for (int i = 0; i < 30;i++)
			cout << "-";
		cout << endl;
		cout << setw(16) << "MENU" << endl;
		for (int i = 0; i < 30;i++)
			cout << "-";
		cout << endl;

		cout << "(1) Add songs" << endl;
		cout << "(2) Delete songs" << endl;
		cout << "(3) Update/Edit songs" << endl;
		cout << "(4) List" << endl;
		cout << "(5) Advanced search" << endl;
		cout << "(6) Creating a random playlist" << endl;
		cout << "(7) Exit" << endl;
		for (int i = 0; i < 30;i++)
			cout << "-";
		cout << endl;
		for (int i = 0; i < 30;i++)
			cout << "-";
		cout << endl;

		// Ask for choice for action (1-7)
		cout << "Enter 1 - 7 to choose an action: ";
		cin >> choice;

		// Action choose by user (1-7)
		switch (choice)
		{
		case 1: addSong(music, &num_song);
			break;
		case 2: deleteSong(music, &num_song);
			break;
		case 3: updateSearch(music, num_song);
			break;
		case 4: listSong(music, num_song);
			break;
		case 5: advancedSearch(music, num_song);
			break;
		case 6: createPlaylist(music, num_song);
			break;
		case 7: exitFunction(music, num_song);
			break;
			// If user enter the choice which not included between 1 and 7, show invalid input
		default: cout << "Invalid Data. Please enter again.";
				cin.clear();
				while (getchar() != '\n');
				break;
		}
		// Loop until user enters 7 to exit the program
	} while (choice != 7);

	return 0;
}

// Read data from the text file and store into MUSIC collection
int readSong(MUSIC music[])
{
	// Array that can read up to 199 characters to temporary store one line of data from input text file
	char dataRead[200];

	// Initialize index number to 0 
	int i = 0;

	// Link to the input text file
	ifstream in_file("Music Collection.txt");

	if (!in_file)
	{
		// Display error and exit program if error opening input text file 
		cout << "Error opening data file. The Program will now exit!";
		exit(EXIT_FAILURE);
	}
	else
	{
		char delim[] = "|";

		// Read in first row of data from input text file
		in_file.getline(dataRead, 200);

		// Store data from dataRead into the MUSIC collection
		while (in_file)
		{
			char* token = strtok(dataRead, delim);
			strcpy(music[i].song_title, token);

			token = strtok(NULL, delim);
			strcpy(music[i].album, token);

			token = strtok(NULL, delim);
			strcpy(music[i].artist, token);

			token = strtok(NULL, delim);
			strcpy(music[i].composer, token);

			token = strtok(NULL, delim);
			strcpy(music[i].genre, token);

			token = strtok(NULL, delim);
			int token_day = atoi(token);
			music[i].release_date.day = token_day;

			token = strtok(NULL, delim);
			int token_month = atoi(token);
			music[i].release_date.month = token_month;

			token = strtok(NULL, delim);
			int token_year = atoi(token);
			music[i].release_date.year = token_year;

			token = strtok(NULL, delim);
			strcpy(music[i].directory_path, token);
			token = strtok(NULL, delim);

			// i + 1 after 1 song is added 
			i++;
			in_file.getline(dataRead, 200);
		}

		// Close input text file after finished reading data
		in_file.close();
	}

	// Return the number of songs to main function
	return i;
}

// Add songs into MUSIC collection
void addSong(MUSIC music[], int* num_songPtr)
{
	// Display header
	cout << endl;
	for (int i = 0; i < 30;i++)
		cout << "-";
	cout << endl;
	cout << setw(19) << "ADD SONGS" << endl;
	for (int i = 0; i < 30;i++)
		cout << "-";
	cout << endl;
	
	// Number of songs
	int i = *num_songPtr;

	char ans = ' ';

	do
	{
		// To clear input buffer from main 
		while (getchar() != '\n');

		// Get song title from user 
		cout << "Enter song title: ";
		cin.getline(music[i].song_title, ARRAY_SIZE);
		cout << endl;

		// Get song album from user 
		cout << "Enter song album: ";
		cin.getline(music[i].album, ARRAY_SIZE);
		cout << endl;

		// Get the artist name from user 
		cout << "Enter artist name: ";
		cin.getline(music[i].artist, ARRAY_SIZE);
		cout << endl;

		// Get the music composer from user 
		cout << "Enter music composer: ";
		cin.getline(music[i].composer, ARRAY_SIZE);
		cout << endl;

		// Get song genre from user 
		cout << "Enter song genre: ";
		cin.getline(music[i].genre, ARRAY_SIZE);
		cout << endl;

		//Get the release date (day) of the song from user 
		cout << "Enter release date:" << endl;
		do
		{
			cout << "Day (dd): ";
			cin >> music[i].release_date.day;
			cout << endl;
			if (music[i].release_date.day < 1 || music[i].release_date.day > 31)
			{
				cout << "Invalid day. Please enter between 1-31." << endl;
				cin.clear();
				while (getchar() != '\n');
			}

		} while (music[i].release_date.day < 1 || music[i].release_date.day > 31);

		// Get the release date (month) of the song from user
		do
		{
			cout << "Month (mm): ";
			cin >> music[i].release_date.month;
			cout << endl;
			if (music[i].release_date.month < 1 || music[i].release_date.month > 12)
			{
				cout << "Invalid month. Please enter between 1-12.";
				cin.clear();
				while (getchar() != '\n');
			}
		} while (music[i].release_date.month < 1 || music[i].release_date.month > 12);

		// Get the release date (year) of the song from user
		do
		{
			cout << "Year (yyyy): ";
			cin >> music[i].release_date.year;
			cout << endl;
			if (music[i].release_date.year < 1000 || music[i].release_date.year > 10000)
			{
				cout << "Invalid year. Please enter between 1000-10000.";
				cin.clear();
				while (getchar() != '\n');
			}
		} while (music[i].release_date.year < 1000 || music[i].release_date.year > 10000);

		//Get the directory path from the user
		while (getchar() != '\n');
		cout << "Enter the directory path : ";
		cin.getline(music[i].directory_path, 100);
		cout << endl;

		i++;

		// Ask if user wants to add another song
		do {
			cout << "Do you want to add another song? (Y/N): ";
			cin >> ans;
			if (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n')
			{
				cout << "Invalid answer. Please enter Y/N." << endl << endl;
				cin.clear();
				while (getchar() != '\n');
			}
		} while (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n');
		cout << endl;

		// Loop if user wants to add another song
	} while (ans == 'Y' || ans == 'y');

	*num_songPtr = i;

	return;
}

// Delete songs from MUSIC collection
void deleteSong(MUSIC music[], int* num_songPtr)
{
	int delnum = 0;
	char ans = ' ';

	do
	{
		// Display the list number and song title
		for (int i = 0; i < 40;i++)
			cout << "-";
		cout << endl;
		cout << setw(26) << "DELETE SONGS" << endl;
		for (int i = 0; i < 40;i++)
			cout << "-";
		cout << endl;

		// Display the list of song titles 
		for (int count = 0; count < *num_songPtr; count++)
		{
			cout << "(" << count + 1 << ") ";
			cout << music[count].song_title << endl;
		}

		cout << endl;

		// Prompt to let user input which song to delete
		cout << "Choose the song that you want to delete: ";

		do
		{
			// Data validation to make sure user key in existing index number in MUSIC collection
			cin >> delnum;
			if (delnum < 1 || delnum > *num_songPtr)
			{
				cout << "Please enter valid number: ";
				cin.clear();
				while (getchar() != '\n');
			}
		} while (delnum < 1 || delnum > *num_songPtr);

		// Output deleted song by user
		cout << "\nThe deleted song is " << music[delnum - 1].song_title <<
			" by " << music[delnum - 1].artist << "." << endl << endl;


		if (delnum != *num_songPtr)
		{
			// Replace the list that need to delete using the list in loop 
			for (int i = delnum - 1; i < *num_songPtr; i++)
			{
				strcpy(music[i].song_title, music[i + 1].song_title);
				strcpy(music[i].album, music[i + 1].album);
				strcpy(music[i].artist, music[i + 1].artist);
				strcpy(music[i].composer, music[i + 1].composer);
				strcpy(music[i].genre, music[i + 1].genre);
				music[i].release_date.day = music[i + 1].release_date.day;
				music[i].release_date.month = music[i + 1].release_date.month;
				music[i].release_date.year = music[i + 1].release_date.year;
				strcpy(music[i].directory_path, music[i + 1].directory_path);
			}
		}
		else
		{
			// Delete the last row of data
			strcpy(music[delnum].song_title, "");
			strcpy(music[delnum].album, "");
			strcpy(music[delnum].artist, "");
			strcpy(music[delnum].composer, "");
			strcpy(music[delnum].genre, "");
			music[delnum].release_date.day = NULL;
			music[delnum].release_date.month = NULL;
			music[delnum].release_date.year = NULL;
			strcpy(music[delnum].directory_path, "");
		}

		--* num_songPtr;

		// Ask if user wants to delete another song
		do {
			cout << "Do you want to delete another song? (Y/N): ";
			cin >> ans;
			if (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n')
			{
				cout << "Invalid answer. Please enter Y/N." << endl << endl;
				cin.ignore();
				while (getchar() != '\n');
			}
		} while (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n');

		cout << endl;
		// Loop if user wants to delete another song
	} while (ans == 'Y' || ans == 'y');

	return;
}

// Update and Edit songs from MUSIC collection
void updateSearch(MUSIC music[], const int num_song)
{
	char ans = ' ';
	do
	{
		// Array of integers to store index numbers of matching songs
		int indexNo[100] = {};

		// Starting index number of count of matches
		int countMatch = 0;

		// The index number of exact match 
		int match = 0;

		// To decide whether to repeat the loop 
		bool repeat = false;

		int choice = 0;


		// Prompt user for input type
		for (int i = 0; i < 25;i++)
			cout << "-";
		cout << endl;
		cout << setw(19) << "UPDATE / EDIT" << endl;
		for (int i = 0; i < 25;i++)
			cout << "-";
		cout << "\n(1) Song Title\n(2) Artist\n(3) Album" << endl << endl;
		cout << "Please choose one of the above(1 - 3) to search: ";
		do
		{
			cin >> choice;
			if (choice != 1 && choice != 2 && choice != 3)
			{
				cout << "Please only enter 1, 2 or 3: ";
				cin.clear();
				while (getchar() != '\n');
			}
		} while (choice != 1 && choice != 2 && choice != 3);

		// Clear input buffer
		while (getchar() != '\n');

		switch (choice)
		{
		case 1: // Song title
			char title[ARRAY_SIZE];
			do
			{
				cout << "Enter song title(Case Sensitive): ";
				cin.getline(title, 50);
				cout << endl;

				// Find matching entry in collection
				for (int i = 0; i < num_song; i++) // Loop to compare user input with existing collection
				{
					if (strstr(music[i].song_title, title) != NULL) // If not NULL, means that there is a match 
					{
						indexNo[countMatch] = i; // Get the index number(s) of the entry with a match
						countMatch++;  // Count the number of matches
					}
				}
				cout << "There are " << countMatch << " matching result(s)." << endl << endl;

				// Find the exact match of song
				if (countMatch > 1) // If there is more than 1 match
				{
					// Display matching songs
					for (int k = 0; k < countMatch; k++)
					{
						cout << left << "(" << k + 1 << ") " << setw(36) << music[indexNo[k]].song_title
							<< setw(21) << music[indexNo[k]].album << setw(18) << music[indexNo[k]].artist
							<< setw(34) << music[indexNo[k]].composer << setw(12) << music[indexNo[k]].genre << setw(3) << right
							<< music[indexNo[k]].release_date.day << "/" << setw(2) << music[indexNo[k]].release_date.month << "/"
							<< setw(8) << left << music[indexNo[k]].release_date.year << music[indexNo[k]].directory_path << endl << endl;
					}

					do
					{
						cout << "Please enter the number for your song choice: ";
						cin >> match;
						cout << endl;
						if (match < 1 || match > countMatch)
						{
							cout << "Please enter a valid number for your song choice." << endl;
							cin.clear();
							while (getchar() != '\n');

						}
						// Else exits loop
						else repeat = true;
					} while (match < 1 || match > countMatch);
				}

				// No matches
				else if (countMatch == 0)
					cout << "Please try again." << endl << endl;
				else if (countMatch == 1)
				{
					cout << left << "(1) " << setw(36) << music[indexNo[0]].song_title
						<< setw(21) << music[indexNo[0]].album << setw(18) << music[indexNo[0]].artist
						<< setw(34) << music[indexNo[0]].composer << setw(12)
						<< music[indexNo[0]].genre << setw(3) << right << music[indexNo[0]].release_date.day << "/"
						<< setw(2) << music[indexNo[0]].release_date.month << "/"
						<< setw(8) << left << music[indexNo[0]].release_date.year << music[indexNo[0]].directory_path
						<< endl << endl;

					match = 1;
					repeat = true;
				}
			} while (!repeat);

			// Take the music collection structure index number (indexNo[match - 1]), point to it and edit its contents
			updateEdit(music, match, indexNo);
			break;

		case 2: // Artist

			char artist[ARRAY_SIZE];
			do {

				cout << "Enter artist name(Case Sensitive): ";
				cin.getline(artist, 50);
				cout << endl;

				// Find matching entry in collection

				for (int i = 0; i < num_song; i++) // Loop to compare user input with existing collection
				{
					if (strstr(music[i].artist, artist) != NULL) // If not NULL, means that there is a match 
					{
						indexNo[countMatch] = i; // Get the index number(s) of the entry with a match
						countMatch++;  // Count the number of matches
					}
				}
				cout << "There are " << countMatch << " matching result(s)." << endl << endl;

				// Find the exact match of song
				if (countMatch > 1) // If there is more than 1 match
				{
					for (int k = 0; k < countMatch; k++) // Display matching songs
					{
						cout << left << "(" << k + 1 << ") " << setw(36) << music[indexNo[k]].song_title
							<< setw(21) << music[indexNo[k]].album << setw(18) << music[indexNo[k]].artist
							<< setw(34) << music[indexNo[k]].composer << setw(12) << music[indexNo[k]].genre << setw(3) << right
							<< music[indexNo[k]].release_date.day << "/" << setw(2) << music[indexNo[k]].release_date.month << "/"
							<< setw(8) << left << music[indexNo[k]].release_date.year << music[indexNo[k]].directory_path << endl << endl;

					}
					do
					{
						cout << "Please enter the number for your song choice: ";
						cin >> match;
						cout << endl;
						if (match < 1 || match > countMatch)
						{
							cout << "Please enter a valid number for your song choice." << endl;
							cin.clear();
							while (getchar() != '\n');
						}
						// Else exits loop
						else repeat = true;
					} while (match < 1 || match > countMatch);
				}
				// No matches
				else if (countMatch == 0)
					cout << "Please try again." << endl << endl;
				else if (countMatch == 1)
				{
					cout << left << "(1) " << setw(36) << music[indexNo[0]].song_title
						<< setw(21) << music[indexNo[0]].album << setw(18) << music[indexNo[0]].artist
						<< setw(34) << music[indexNo[0]].composer << setw(12)
						<< music[indexNo[0]].genre << setw(3) << right << music[indexNo[0]].release_date.day << "/"
						<< setw(2) << music[indexNo[0]].release_date.month << "/"
						<< setw(8) << left << music[indexNo[0]].release_date.year << music[indexNo[0]].directory_path
						<< endl << endl;

					match = 1;
					repeat = true;
				}
			} while (!repeat);

			// Take the music collection structure index number (indexNo[match - 1]), point to it and edit its contents
			updateEdit(music, match, indexNo);
			break;

		case 3: // Album

			char album[ARRAY_SIZE];
			do
			{
				cout << "Enter album name(Case Sensitive): ";
				cin.getline(album, 50);
				cout << endl;

				// Find matching entry in collection
				for (int i = 0; i < num_song; i++) // Loop to compare user input with existing collection
				{
					if (strstr(music[i].album, album) != NULL) // If not NULL, means that there is a match 
					{
						indexNo[countMatch] = i; // Get the index number(s) of the entry with a match
						countMatch++;  // Count the number of matches
					}
				}
				cout << "There are " << countMatch << " matching result(s):" << endl << endl;

				// Find the exact match of song
				if (countMatch > 1) // If there is more than 1 match
				{
					// Display matching songs
					for (int k = 0; k < countMatch; k++)
					{
						cout << left << "(" << k + 1 << ") " << setw(36) << music[indexNo[k]].song_title
							<< setw(21) << music[indexNo[k]].album << setw(18) << music[indexNo[k]].artist
							<< setw(34) << music[indexNo[k]].composer << setw(12) << music[indexNo[k]].genre << setw(3) << right
							<< music[indexNo[k]].release_date.day << "/" << setw(2) << music[indexNo[k]].release_date.month << "/"
							<< setw(8) << left << music[indexNo[k]].release_date.year << music[indexNo[k]].directory_path << endl << endl;
					}
					do
					{
						cout << "Please enter the number for your song choice: ";
						cin >> match;
						cout << endl;
						if (match < 1 || match > countMatch)
						{
							cout << "Please enter a valid number for your song choice." << endl;
							cin.clear();
							while (getchar() != '\n');

						}
						// Else exits loop
						else repeat = true;
					} while (match < 1 || match > countMatch);
				}
				// No matches
				else if (countMatch == 0)
					cout << "Please try again." << endl << endl;
				else if (countMatch == 1)
				{
					cout << left << "(1) " << setw(36) << music[indexNo[0]].song_title
						<< setw(21) << music[indexNo[0]].album << setw(18) << music[indexNo[0]].artist
						<< setw(34) << music[indexNo[0]].composer << setw(12)
						<< music[indexNo[0]].genre << setw(3) << right << music[indexNo[0]].release_date.day << "/"
						<< setw(2) << music[indexNo[0]].release_date.month << "/"
						<< setw(8) << left << music[indexNo[0]].release_date.year << music[indexNo[0]].directory_path
						<< endl;

					match = 1;
					repeat = true;
				}
			} while (!repeat);

			// Take the music collection structure index number (indexNo[match - 1]), point to it and edit its contents
			updateEdit(music, match, indexNo);
		default:break;
		}
		// Ask if user if wants to update/edit another song
		do {
			cin.clear();
			cout << "\nDo you want to update/edit another song? (Y/N): ";
			cin >> ans;
			cout << endl;
			if (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n')
				cout << "Invalid answer. Please enter Y/N." << endl;
		} while (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n');

		// Set back header to right-aligned 
		cout << right;

		// Loop if user wants to update/edit another song
	} while (ans == 'y' || ans == 'Y');

	return;
}

// Update and Edit songs from MUSIC collection 
void updateEdit(MUSIC music[], int match, int indexNo[])
{
	// Clear input buffer
	while (getchar() != '\n');

	// Get new song name
	cout << "Enter new song name: ";
	cin.getline(music[indexNo[match - 1]].song_title, ARRAY_SIZE);
	cout << endl;

	// Get new album name
	cout << "Enter new album name: ";
	cin.getline(music[indexNo[match - 1]].album, ARRAY_SIZE);
	cout << endl;

	// Get new artist name
	cout << "Enter new artist name: ";
	cin.getline(music[indexNo[match - 1]].artist, ARRAY_SIZE);
	cout << endl;

	// Get new music composer name
	cout << "Enter new music composer name: ";
	cin.getline(music[indexNo[match - 1]].composer, ARRAY_SIZE);
	cout << endl;

	// Get new song genre name
	cout << "Enter new song genre: ";
	cin.getline(music[indexNo[match - 1]].genre, ARRAY_SIZE);
	cout << endl;

	// Get new song release date 
	cout << "Enter new release date: " << endl;
	do
	{
		cout << "Day (dd): ";
		cin >> (music[indexNo[match - 1]].release_date.day);
		cout << endl;
		if ((music[indexNo[match - 1]].release_date.day) < 1 || (music[indexNo[match - 1]].release_date.day) > 31)
		{
			cout << "Invalid day. Please enter between 1-31." << endl << endl;
			cin.clear();
			while (getchar() != '\n');
		}
	} while ((music[indexNo[match - 1]].release_date.day) < 1 || (music[indexNo[match - 1]].release_date.day) > 31);
	do
	{
		cout << "Month (mm): ";
		cin >> music[indexNo[match - 1]].release_date.month;
		cout << endl;
		if ((music[indexNo[match - 1]].release_date.month) < 1 || (music[indexNo[match - 1]].release_date.month) > 12)
		{
			cout << "Invalid month. Please enter between 1-12." << endl << endl;
			cin.clear();
			while (getchar() != '\n');
		}
	} while ((music[indexNo[match - 1]].release_date.month) < 1 || (music[indexNo[match - 1]].release_date.month) > 12);
	do
	{
		cout << "Year (yyyy): ";
		cin >> music[indexNo[match - 1]].release_date.year;
		cout << endl;
		if (music[indexNo[match - 1]].release_date.year < 1000 || music[indexNo[match - 1]].release_date.year > 10000)
		{
			cout << "Invalid year. Please enter between 1000-10000." << endl << endl;
			cin.clear();
			while (getchar() != '\n');
		}
	} while (music[indexNo[match - 1]].release_date.year < 1000 || music[indexNo[match - 1]].release_date.year > 10000);

	// Clear input buffer 
	while (getchar() != '\n');

	// Get new directory path of the song
	cout << "Directory path: ";
	cin.getline(music[indexNo[match - 1]].directory_path, 100);

	return;
}

// List of all the songs in MUSIC collection
void listSong(MUSIC music[], int num_song)
{
	// Output table header 
	for (int i = 0; i < 188; i++)
		cout << "-";
	cout << endl;
	cout << setw(5) << "|No.|" << setw(22) << "Song Title" << setw(14) << "|"
		<< setw(12) << "Album" << setw(9) << "|" << setw(11) << "Artist" << setw(7) << "|"
		<< setw(20) << "Composer" << setw(14) << "|" << setw(8) << "Genre" << setw(4) << "|"
		<< setw(13) << "Release Date" << setw(2) << "|" << setw(30) << "Directory Path"
		<< setw(17) << "|" << endl;
	for (int i = 0; i < 188; i++)
		cout << "-";
	cout << endl;

	// Output table content
	for (int i = 0; i < num_song;i++)
	{
		cout << setw(5) << left << i + 1 << setw(36)
			<< music[i].song_title << setw(21) << music[i].album << setw(18) << music[i].artist
			<< setw(34) << music[i].composer << setw(12)
			<< music[i].genre << setw(3) << right
			<< music[i].release_date.day << "/" << setw(2) << music[i].release_date.month << "/"
			<< setw(8) << left << music[i].release_date.year << music[i].directory_path << endl;
		cout << endl;
	}

	// Set back the output of MENU header in main menu to right-aligned
	cout << right << endl;

	return;
}

// Advanced search for songs in MUSIC collection
void advancedSearch(MUSIC music[], int num_song)
{
	int choice = 0;
	char ans = ' ';

	do
	{
		// Initialize the number of matching results to 0
		int count = 0;

		// Prompt user to choose song title / artist / album
		for (int i = 0; i < 25;i++)
			cout << "-";
		cout << endl;
		cout << setw(20) << "ADVANCED SEARCH" << endl;
		for (int i = 0; i < 25;i++)
			cout << "-";
		cout << "\n(1) Song title\n(2) Artist\n(3) Album" << endl << endl;
		cout << "Please choose one of the above(1 - 3) for advanced search: ";

		// Data validation for choice by user
		do {
			cin >> choice;
			if (choice != 1 && choice != 2 && choice != 3)
			{
				cout << "Please only enter 1, 2 or 3: ";
				cin.clear();
				while (getchar() != '\n');
			}
		} while (choice != 1 && choice != 2 && choice != 3);

		// To clear input buffer
		while (getchar() != '\n');

		// User choose to search by song title (option 1)
		if (choice == 1)
		{
			// Array to store input from user to search for matching song title
			char title[ARRAY_SIZE];

			// Get input from user
			cout << endl << "Please enter song title(Case Sensitive): ";
			cin.getline(title, ARRAY_SIZE);
			cout << endl;

			for (int i = 0; i < num_song; i++)
			{
				// Output matching results
				if (strstr(music[i].song_title, title) != NULL)
				{
					cout << setw(1) << "(" << (count + 1) << ") " << setw(35) << left << music[i].song_title << "|" << setw(25)
						<< left << music[i].artist << "|" << setw(35) << music[i].album << endl << endl;
					count++;
				}
			}

			// No matching result
			if (count == 0)
				cout << "No matching results." << endl;
			// Show number of matching results
			else
				cout << "There are " << count << " matching result(s)." << endl << endl;
		}
		// User choose to search by artist (option 2)
		else if (choice == 2)
		{
			// Array to store input from user to search for matching artist name
			char artist[ARRAY_SIZE];

			// Get input from user
			cout << endl << "Please enter artist name(Case Sensitive): ";
			cin.getline(artist, ARRAY_SIZE);
			cout << endl;

			for (int i = 0; i < num_song; i++)
			{
				// Output matching results
				if (strstr(music[i].artist, artist) != NULL)
				{
					cout << setw(1) << "(" << (count + 1) << ") " << setw(35) << left << music[i].song_title << "|" << setw(25)
						<< left << music[i].artist << "|" << setw(35) << music[i].album << endl << endl;
					count++;
				}
			}

			// No matching result
			if (count == 0)
				cout << "No matching result(s)." << endl;
			// Show number of matching results
			else
				cout << "There are " << count << " matching result(s)." << endl << endl;
		}
		// User choose to search by album (option 3)
		else
		{
			// Array to store input from user to search for matching album name
			char album[ARRAY_SIZE];

			// Get input from user
			cout << endl << "Please enter album name(Case Sensitive): ";
			cin.getline(album, ARRAY_SIZE);
			cout << endl;

			for (int i = 0; i < num_song; i++)
			{
				// Output matching results
				if (strstr(music[i].album, album) != NULL)
				{
					cout << setw(1) << "(" << (count + 1) << ") " << setw(35) << left << music[i].song_title << "|" << setw(25)
						<< left << music[i].artist << "|" << setw(35) << music[i].album << endl << endl;
					count++;
				}
			}

			// No matching result
			if (count == 0)
				cout << "No matching result(s)." << endl;
			// Show number of matching results
			else
				cout << "There are " << count << " matching result(s)." << endl << endl;
		}
		// Ask if user wants to do another advanced search
		do {
			cout << "Do you want to do advanced search again? (Y/N): ";
			cin >> ans;
			if (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n')
			{
				cout << "Invalid answer. Please enter Y/N." << endl << endl;
				cin.ignore();
				while (getchar() != '\n');

			}
		} while (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n');

		// Set back header of MAIN to right-aligned 
		cout << right;

		// Loop if user wants to do advanced search again
	} while (ans == 'y' || ans == 'Y');

	return;
}

// Create a random playlist from the collection
void createPlaylist(MUSIC music[], int num_song)
{
	// Array to store input from user to find matching result
	char artist_genre[100];

	// An empty string 
	char emptystring[2] = "";

	// Array to store index number of data in collection 
	int index_num[100] = {};

	char ans = ' ';

	do
	{
		// Initialize the number of matching results to 0 
		int count = 0;

		// Output 
		cout << endl;
		for (int i = 0; i < 30;i++)
			cout << "-";
		cout << endl;
		cout << setw(22) << "CREATE PLAYLIST" << endl;
		for (int i = 0; i < 30;i++)
			cout << "-";
		cout << endl << "Enter in full, GENRE or ARTIST name(Case Sensitive): ";

		// To clear input buffer
		while (getchar() != '\n');

		do
		{
			// Input from user 
			cin.getline(artist_genre, ARRAY_SIZE);

			// To check if the entered string is not an empty string
			if (strcmp(artist_genre, emptystring) != 0)
			{
				for (int i = 0;i < num_song;i++)
				{
					// To find matching results in genre
					if (strcmp(artist_genre, music[i].genre) == 0)
					{
						// Stores the index number of valid genre song
						index_num[count] = i;
						count++;
					}
					// To find matching results in artist 
					else if (strcmp(artist_genre, music[i].artist) == 0)
					{
						index_num[count] = i;
						count++;
					}
				}
				// To show number of matching results
				if (count != 0)
				{
					cout << "Number of song(s) found: " << count << endl << endl;
				}
				else
				{
					cout << "No songs found." << endl;
					cout << "Please enter valid input: ";
				}
			}
			else
			{
				cout << "No songs found." << endl;
				cout << "Please enter valid input: ";
			}

		} while (count == 0);

		// Variable to store random generated index number of matching data
		int music_index;

		// Variable to store random generated number 
		int rand_indexes;

		// Array of bool data type to act as "checklist" to ensure random generated number does not repeat
		bool have_rand[120] = {};

		// Initialize all bool data type to false 
		for (int r = 0; r < num_song; r++)
			have_rand[r] = false;

		// Generate and store first random generated number with matching data
		rand_indexes = rand() % count;

		// Set first random generated number as true
		have_rand[rand_indexes] = true;

		// Store generated index number of matching data
		music_index = index_num[rand_indexes];

		// Display first matching result
		cout << "PLAYLIST(" << artist_genre << ") " << endl;
		cout << "(1) " << music[music_index].song_title << endl;

		srand(time(NULL));
		int q = 2;

		// If having less than 10 matching results
		if (count < 10)
		{
			for (int i = 0; i < count - 1; i++)
			{
				do
				{
					rand_indexes = rand() % count;

					// Loop if the bool type stored is already true indicating that a result is matched with this index number
				} while (have_rand[rand_indexes]);

				// Set generated random index number as true, so it is not generated again
				have_rand[rand_indexes] = true;

				// Store generated index number of matching data
				music_index = index_num[rand_indexes];

				// Output matching results
				cout << "(" << q << ") " << music[music_index].song_title << endl;
				q++;
			}
		}
		// If having more than 10 matching results
		else
		{

			for (int i = 0; i < 9; i++)
			{
				do
				{
					rand_indexes = rand() % count;
					// Loop if the bool type stored is already true indicating that a result is matched with this index number
				} while (have_rand[rand_indexes]);

				// Set generated random index number as true, so it is not generated again
				have_rand[rand_indexes] = true;

				// Store generated index number of matching data
				music_index = index_num[rand_indexes];

				// Output matching results
				cout << "(" << q << ") " << music[music_index].song_title << endl;
				q++;
			}
		}

		// Ask if user wants create another random playlist
		do {
			cout << endl << "Do you want to create random playlist again? (Y/N): ";
			cin >> ans;
			if (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n')
			{
				cout << "Invalid answer. Please enter Y/N." << endl << endl;
				cin.ignore();
				while (getchar() != '\n');
			}
		} while (ans != 'Y' && ans != 'y' && ans != 'N' && ans != 'n');

		// Loop again if user wants to create another random playlist
	} while (ans == 'y' || ans == 'Y');

	return;
}

// Exit the program and store data from MUSIC collection into output text file
void exitFunction(MUSIC music[], int num_song)
{
	// Link to output data file
	ofstream out_file("Music Collection.txt");

	if (!out_file)
		// Display error if error opening output text file
		cout << "Error opening output file, records are not updated.\n";
	else
	{
		// Output data from MUSIC collection into output text file
		for (int i = 0; i < num_song; i++)
		{
			out_file << music[i].song_title << "|";
			out_file << music[i].album << "|";
			out_file << music[i].artist << "|";
			out_file << music[i].composer << "|";
			out_file << music[i].genre << "|";
			out_file << music[i].release_date.day << "|";
			out_file << music[i].release_date.month << "|";
			out_file << music[i].release_date.year << "|";
			out_file << music[i].directory_path << endl;
		}

		// Close the output text file after finished storing data
		out_file.close();
	}

	// Exit function
	exit(EXIT_SUCCESS);

	return;
}

