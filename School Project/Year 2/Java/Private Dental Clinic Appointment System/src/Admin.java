public class Admin extends User
{
	// Constructor 
	public Admin(String name, String userType, String username, String password)
	{
		super(name, userType, username, password);
	}
	
	@Override
	// Admin details
	public String toString()
	{
		return "\nName: " + getName() + "\nUser Type: " + getUserType() + "\nUsername: " + getUsername();
	}
}