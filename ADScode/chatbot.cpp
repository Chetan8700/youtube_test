#include <iostream>
#include <stack>
#include <string>

// Define the tree node for the trinary tree
struct TreeNode {
    std::string question;
    TreeNode* option1;
    TreeNode* option2;
    TreeNode* option3;
    std::string recommendation; // Add this to hold final recommendations

    // Constructor
    TreeNode(std::string q, std::string rec = "") 
        : question(q), option1(nullptr), option2(nullptr), option3(nullptr), recommendation(rec) {}
};

// Structure to store user preferences in a stack
struct UserPreference {
    std::string category;
    std::string product;
    std::string priceRange;
    std::string brand;
    std::string type;
};

std::stack<UserPreference> preferenceStack;

// Function to build the trinary tree for electronics recommendations
TreeNode* buildElectronicsTree() {
    TreeNode* root = new TreeNode("What type of electronic product are you interested in? (1. Laptops  2. Smartphones  3. Cameras)");

    // Price range questions
    TreeNode* laptops = new TreeNode("What is your price range for laptops? (1. Below $500  2. $500-$1000  3. Above $1000)");
    TreeNode* smartphones = new TreeNode("What is your price range for smartphones? (1. Below $300  2. $300-$600  3. Above $600)");
    TreeNode* cameras = new TreeNode("What is your price range for cameras? (1. Below $400  2. $400-$800  3. Above $800)");

    root->option1 = laptops;
    root->option2 = smartphones;
    root->option3 = cameras;

    // Laptops subtree
    TreeNode* laptopBrands = new TreeNode("Which brand do you prefer for laptops? (1. HP  2. Dell  3. Lenovo)");
    laptops->option1 = laptopBrands;
    laptops->option2 = laptopBrands;
    laptops->option3 = laptopBrands;

    TreeNode* laptopType = new TreeNode("What type of laptop do you prefer? (1. Gaming  2. Standard  3. Ultrabook)");
    laptopBrands->option1 = laptopType;
    laptopBrands->option2 = laptopType;
    laptopBrands->option3 = laptopType;

    // New laptop questions (Battery Life)
    TreeNode* laptopBatteryLife = new TreeNode("What is your preferred battery life? (1. Less than 6 hours  2. 6-10 hours  3. More than 10 hours)");
    laptopType->option1 = laptopBatteryLife;
    laptopType->option2 = laptopBatteryLife;
    laptopType->option3 = laptopBatteryLife;

    // Final laptop recommendations based on battery life
    laptopBatteryLife->option1 = new TreeNode("", "We recommend HP Pavilion Gaming with less than 6 hours of battery life.");
    laptopBatteryLife->option2 = new TreeNode("", "We recommend Dell Inspiron with 6-10 hours of battery life.");
    laptopBatteryLife->option3 = new TreeNode("", "We recommend Lenovo ThinkPad with more than 10 hours of battery life.");

    // Smartphones subtree
    TreeNode* smartphoneBrands = new TreeNode("Which brand do you prefer for smartphones? (1. Samsung  2. Apple  3. Google)");
    smartphones->option1 = smartphoneBrands;
    smartphones->option2 = smartphoneBrands;
    smartphones->option3 = smartphoneBrands;

    TreeNode* smartphoneStorage = new TreeNode("What storage capacity do you prefer? (1. 64GB  2. 128GB  3. 256GB or more)");
    smartphoneBrands->option1 = smartphoneStorage;
    smartphoneBrands->option2 = smartphoneStorage;
    smartphoneBrands->option3 = smartphoneStorage;

    // New smartphone questions (Screen size)
    TreeNode* smartphoneScreenSize = new TreeNode("What screen size do you prefer? (1. Less than 6 inches  2. 6-6.5 inches  3. More than 6.5 inches)");
    smartphoneStorage->option1 = smartphoneScreenSize;
    smartphoneStorage->option2 = smartphoneScreenSize;
    smartphoneStorage->option3 = smartphoneScreenSize;

    // Final smartphone recommendations
    smartphoneScreenSize->option1 = new TreeNode("", "We recommend Samsung Galaxy S21 with less than 6 inches screen size.");
    smartphoneScreenSize->option2 = new TreeNode("", "We recommend iPhone 13 with 6-6.5 inches screen size.");
    smartphoneScreenSize->option3 = new TreeNode("", "We recommend Google Pixel 6 with more than 6.5 inches screen size.");

    // Cameras subtree
    TreeNode* cameraBrands = new TreeNode("Which brand do you prefer for cameras? (1. Canon  2. Nikon  3. Sony)");
    cameras->option1 = cameraBrands;
    cameras->option2 = cameraBrands;
    cameras->option3 = cameraBrands;

    TreeNode* cameraType = new TreeNode("What type of camera are you looking for? (1. DSLR  2. Mirrorless  3. Point and Shoot)");
    cameraBrands->option1 = cameraType;
    cameraBrands->option2 = cameraType;
    cameraBrands->option3 = cameraType;

    // New camera questions (Megapixels)
    TreeNode* cameraMegapixels = new TreeNode("What megapixel count do you prefer? (1. Below 20MP  2. 20MP-30MP  3. Above 30MP)");
    cameraType->option1 = cameraMegapixels;
    cameraType->option2 = cameraMegapixels;
    cameraType->option3 = cameraMegapixels;

    // Final camera recommendations
    cameraMegapixels->option1 = new TreeNode("", "We recommend Canon EOS Rebel with below 20MP.");
    cameraMegapixels->option2 = new TreeNode("", "We recommend Nikon D7500 with 20MP-30MP.");
    cameraMegapixels->option3 = new TreeNode("", "We recommend Sony A7R IV with above 30MP.");

    return root;
}

// Function to save user preferences into a stack
void savePreference(std::string category, std::string product, std::string priceRange, std::string brand, std::string type) {
    UserPreference pref = {category, product, priceRange, brand, type};
    preferenceStack.push(pref);
}

// Function to backtrack the last saved preference (if user changes their mind)
void backtrackPreference() {
    if (!preferenceStack.empty()) {
        preferenceStack.pop();  // Remove the last preference
    }
}

// Function to navigate through the trinary decision tree
void chatbotConversation(TreeNode* root) {
    TreeNode* currentNode = root;
    while (currentNode != nullptr) {
        std::cout << currentNode->question << std::endl;
        std::string userResponse;
        std::cin >> userResponse;

        if (userResponse == "1") {
            currentNode = currentNode->option1;
        } else if (userResponse == "2") {
            currentNode = currentNode->option2;
        } else if (userResponse == "3") {
            currentNode = currentNode->option3;
        } else {
            std::cout << "Invalid input. Please select 1, 2, or 3." << std::endl;
            continue; // Skip the rest of the loop and prompt again
        }

        // Check if we reached a leaf node (recommendation)
        if (currentNode && currentNode->recommendation != "") {
            std::cout << currentNode->recommendation << std::endl; // Display recommendation
            std::cout << "Thank you for using the Electronics Recommendation Chatbot!" << std::endl;
            break; // Exit the loop after displaying the recommendation
        }
    }
}

// Main function to initiate the chatbot conversation
int main() {
    TreeNode* electronicsTree = buildElectronicsTree();
    std::cout << "Welcome to the Electronics Recommendation Chatbot!" << std::endl;
    chatbotConversation(electronicsTree);
    return 0;
}