# Tech Test Notes

I have been able to complete the first two tickets in the time, the third ticket I would approach as follows:
- Add the type filter to the search form as a select field
- Update the search endpoint in DashboardController, adding a type condition to the query
- Write a test to ensure the type filter is returning correct results
- Make the select field a component as it is now used in multiple places

I also noticed a bug with the latest items query on the dashboard, which I fixed on a commit marked [bugfix]

## Questions
Questions about the codebase

- Is there a reason route groups are not used in the routes file? The current set up is a bit verbose. However, if this is part of your internal code style that's fair enough. I have restructured into groups in my response.
- For some reason the content type "WEBLINK" is in caps? This seems inconsistent but again I'm not sure if this is an internal naming convention.

## Items missing that are outside of the scope of this test
Suggestions for improvements or features not part of the scope of this tech test

- Add tests for the Items admin
- There is an active column in the items table which isn't taken into account in queries, I'd implement a model scope to do this
- The edit item form is missing the type field to change the type
- No message is shown in the items list after creating, editing or now deleting an item
