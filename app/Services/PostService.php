namespace App\Services;

use App\Models\User;

class UserService
{
public function create(array $data): User
{
// Your logic to create a new user and return the created User instance
}

public function update(User $user, array $data): bool
{
// Your logic to update the user attributes and return true/false based on success/failure
}

public function delete(User $user): bool
{
// Your logic to delete the user and return true/false based on success/failure
}

public function getById(int $id): ?User
{
// Your logic to fetch the user by ID and return the User instance or null if not found
}

// Add other methods for fetching all users, searching, etc.
}
